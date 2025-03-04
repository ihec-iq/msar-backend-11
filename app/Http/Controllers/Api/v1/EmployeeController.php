<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\HrDocumentController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeBonusRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Resources\Employee\EmployeeBigLiteResource;
use App\Http\Resources\Employee\EmployeeBonusResource;
use App\Http\Resources\Employee\EmployeeLiteBonusResource;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\Employee\EmployeeResourceCollection;
use App\Http\Resources\PaginatedResourceCollection;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /** @var \App\Models\User */
    public function index()
    {
        $data = Employee::orderBy('name');
        #region "Check Premission [vacation office ,vacation center ]"
        $data = $data->whereHas('EmployeeType', function ($query) {
            $employeeType = ["1"];
            $user = Auth::user();
            if ($user->hasAnyPermission(['vacation office'])) {
                array_push($employeeType, "2");
            }
            if (Auth::user()->hasAnyPermission(['vacation center'])) {
                array_push($employeeType, "3");
            }
            array_push($employeeType, "4");
            $query->whereIn('id', $employeeType);
        });
        #endregion
        return EmployeeResource::collection(Cache::rememberForever('employees', function () use ($data) {
            return $data->get();
        })); 
    }

    public function getLite()
    {
       
        $data = Employee::orderBy('name');
        #region "Check Premission [vacation office ,vacation center ]"
        $data = $data->whereHas('EmployeeType', function ($query) {
            $employeeType = ["1"];
            if (Auth::user()->hasAnyPermission(['vacation office'])) {
                array_push($employeeType, "2");
            }
            if (Auth::user()->hasAnyPermission(['vacation center'])) {
                array_push($employeeType, "3");
            }
            array_push($employeeType, "4");
            $query->whereIn('id', $employeeType);
        });
        #endregion
         //$data =  $data->get();
        // $data = Cache::remember('getLite_employees', 60*60*24, function () use ($data) {
        //     return $data->get();
        // });

        return EmployeeBigLiteResource::collection(Cache::rememberForever('employees_lite', function () use ($data) {
            return $data->get();
        })); 
    }

    public function filter(Request $request)
    {
        $filter_bill = [];
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;
        if (!$request->isNotFilled('name') && $request->name != '') {
            $filter_bill[] = ['name', 'like', '%' . $request->name . '%'];
        }
        if (
            !$request->isNotFilled('sectionId') &&
            $request->sectionId != '' && $request->sectionId != '0' && $request->sectionId != '1'
        ) {
            $filter_bill[] = ['section_id', $request->sectionId];
        }
        if (
            !$request->isNotFilled('isPerson') && $request->sectionId != ''
        ) {
            $filter_bill[] = ['is_person', $request->isPerson];
        } else {
            $filter_bill[] = ['is_person', true];
        }
        $data = Employee::orderBy('name')->where($filter_bill);
        #region "Check Premission [vacation office ,vacation center ]"
        $data = $data->whereHas('EmployeeType', function ($query) {
            $employeeType = ["1"];
            if (Auth::user()->hasAnyPermission(['vacation office'])) {
                array_push($employeeType, "2");
            }
            if (Auth::user()->hasAnyPermission(['vacation center'])) {
                array_push($employeeType, "3");
            }
            array_push($employeeType, "4");
            $query->whereIn('id', $employeeType);
        });

        #endregion
        $data = $data->paginate($limit);

        if (empty($data) || $data == null) {
            return $this->error(__('general.loadFailed'));
        } else {
            return $this->ok(new EmployeeResourceCollection($data));
        }
    }
public function filterLite(Request $request)
    {
        $filter_bill = [];
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;
        if (!$request->isNotFilled('name') && $request->name != '') {
            $filter_bill[] = ['name', 'like', '%' . $request->name . '%'];
        }
        if (
            !$request->isNotFilled('sectionId') &&
            $request->sectionId != '' && $request->sectionId != '0' && $request->sectionId != '1'
        ) {
            $filter_bill[] = ['section_id', $request->sectionId];
        }
        if (
            !$request->isNotFilled('isPerson') && $request->sectionId != ''
        ) {
            $filter_bill[] = ['is_person', $request->isPerson];
        } else {
            $filter_bill[] = ['is_person', true];
        }
        $data = Employee::orderBy('name')->where($filter_bill);
        #region "Check Premission [vacation office ,vacation center ]"
        $data = $data->whereHas('EmployeeType', function ($query) {
            $employeeType = ["1"];
            if (Auth::user()->hasAnyPermission(['vacation office'])) {
                array_push($employeeType, "2");
            }
            if (Auth::user()->hasAnyPermission(['vacation center'])) {
                array_push($employeeType, "3");
            }
            array_push($employeeType, "4");
            $query->whereIn('id', $employeeType);
        });

        #endregion
        $data = $data->paginate($limit);
        if (empty($data) || $data == null) {
            return $this->error(__('general.loadFailed'));
        } else {
            return $this->ok(new PaginatedResourceCollection ($data,EmployeeBigLiteResource::class));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateEmployeeRequest $request)
    {
        $user = User::firstOrCreate([
            'name' => $request->name,
            'password' => Hash::make('password'),
            'email' => rand(100000, 99999999999) . '@company.com',
            'active' => 1,
        ]);
        $employee = Employee::create(array_merge($request->validated(), ['user_id' => $user->id]));
        return $this->ok(new EmployeeResource($employee));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        $hrController = new HrDocumentController();
        $hrController->update_employee_date_bonus($employee->id);

        return $this->ok(new EmployeeResource($employee));
    }
    public function updateBonusInfo(UpdateEmployeeBonusRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        $hrController = new HrDocumentController();
        $hrController->update_employee_date_bonus($employee->id);

        return $this->ok(new EmployeeResource($employee));
    }
    public function storeOld(StoreEmployeeRequest $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make('password'),
            'email' => rand(100000, 99999999999) . '@company.com',
            'active' => 1,
        ]);

        $employee = new Employee();
        $employee->user_id = $user->id;

        $employee->name = $request->name;
        $employee->section_id = $request->sectionId;
        $employee->is_person = $request->isPerson;
        $employee->id_card = $request->idCard;
        $employee->number = $request->number;
        $employee->employee_position_id = $request->positionId;
        $employee->move_section_id = $request->MoveSectionId;
        $employee->is_move_section = $request->isMoveSection;
        $employee->employee_type_id = $request->typeId;
        $employee->employee_center_id = $request->centerId;

        if (isset($request->dateWork)) {
            $employee->date_work = $request->dateWork;
        }
        if (isset($request->telegramId)) {
            $employee->telegramId = $request->telegramId;
        }
        $employee->init_vacation = (isset($request->initVacation) && $request->initVacation != '') ?
            $request->initVacation : 0;
        $employee->take_vacation = (isset($request->takeVacation) && $request->takeVacation != '') ?
            $request->takeVacation : 0;
        $employee->init_vacation_sick = (isset($request->initVacationSick) && $request->initVacationSick != '') ?
            $request->initVacationSick : 0;
        $employee->take_vacation_sick = (isset($request->takeVacationSick) && $request->takeVacationSick != '') ?
            $request->takeVacationSick : 0;
        $employee->save();

        return $this->ok(new EmployeeResource($employee));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return $this->ok(new EmployeeResource($employee));
    }
    public function showLite(Employee $employee)
    {
        return $this->ok(new EmployeeBigLiteResource($employee));
    }
    public function showLiteBonus(Employee $employee)
    {
        return $this->ok(new EmployeeLiteBonusResource($employee));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateOld(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->name = $request->name;
        $employee->section_id = $request->sectionId;
        $employee->move_section_id = $request->MoveSectionId;
        $employee->is_move_section = $request->isMoveSection;
        $employee->is_person = $request->isPerson;
        $employee->id_card = $request->idCard;
        $employee->number = $request->number;
        $employee->employee_position_id = $request->positionId;
        $employee->employee_type_id = $request->typeId;
        $employee->employee_center_id = $request->centerId;
        if (isset($request->dateWork)) {
            $employee->date_work = $request->dateWork;
        }
        if (isset($request->telegramId)) {
            $employee->telegramId = $request->telegramId;
        }
        $employee->init_vacation = (isset($request->initVacation) && $request->initVacation != '') ?
            $request->initVacation : 0;
        $employee->take_vacation = (isset($request->takeVacation) && $request->takeVacation != '') ?
            $request->takeVacation : 0;
        $employee->init_vacation_sick = (isset($request->initVacationSick) && $request->initVacationSick != '') ?
            $request->initVacationSick : 0;
        $employee->take_vacation_sick = (isset($request->takeVacationSick) && $request->takeVacationSick != '') ?
            $request->takeVacationSick : 0;
        $employee->save();
        return $this->ok(new EmployeeResource($employee));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return $this->ok(null);
    }

    #region Bonus
    public function bonusCheck(Request $request)
    {
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;

        $data = Employee::orderBy('id', 'desc');
        $data = $data->where('is_person', '=', true);
        if (!$request->isNotFilled('employeeId') && $request->employeeId != '') {
            $data = $data->where('id', $request->employeeId);
        }
        if (!$request->isNotFilled('employeeName') && $request->employeeName != '') {
            $data = $data->where('name', 'like', '%' . $request->employeeName . '%');
        }

        if ($request->isBound == 'true' || $request->isBound == 1) {
            $SettingNumberDayesAlertBonus = "30";
            $local = $SettingNumberDayesAlertBonus;
            if (!$request->isNotFilled('bound') && $request->bound != '') {
                $local =   $request->bound;
            } else {
                $local = Setting::where("key", "SettingNumberDayesAlertBonus")->first()->val_int;
                if ($local) {
                    $SettingNumberDayesAlertBonus = $local;
                }
            }

            if ($local != '' && $local != null) {
                $SettingNumberDayesAlertBonus = $local;
            }

            $data = $data->where(function ($query) use ($SettingNumberDayesAlertBonus) {
                $query->whereRaw('DATEDIFF(date_next_bonus,NOW()) <= ?', $SettingNumberDayesAlertBonus);
            });
        }

        //$data= $data->selectRaw('DATEDIFF(NOW(), date_next_bonus) as DD,*');
        $data = $data->orderBy('date_next_bonus', 'desc')->paginate($limit);
        if (empty($data) || $data == null) {
            return $this->error(__('general.loadFailed'));
        } else {
            return $this->ok(new PaginatedResourceCollection($data, EmployeeBonusResource::class));
        }
    }
    public function bonusCalculate(Request $request)
    {
        $data = Employee::orderBy('id', 'desc');
        $data = $data->where('is_person', '=', true);

        if (!$request->isNotFilled('employeeName') && $request->employeeName != '') {
            $data = $data->where('name', 'like', '%' . $request->employeeName . '%');
        }
        if (!$request->isNotFilled('employeeId') && $request->employeeId != '') {
            $data = $data->where('id', $request->employeeId);
        }

        $dataResult = $data->get();
        $hrController = new HrDocumentController();
        foreach ($dataResult as $employee) {
            $hrController->update_employee_date_bonus($employee->id);
        }
        $dataResult = $data->get(); 

        if (empty($dataResult) || $dataResult == null) {
            return $this->error(__('general.loadFailed'));
        } else {
            return $this->ok(EmployeeBonusResource::collection($dataResult));
        }
    }

    #endregion
}
