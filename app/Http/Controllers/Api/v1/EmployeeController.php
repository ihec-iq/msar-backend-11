<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Resources\Employee\EmployeeBigLiteResource;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\Employee\EmployeeResourceCollection;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        $data = $data->get();
        return $this->ok(EmployeeResource::collection($data));
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
        $data = $data->get();

        return $this->ok(EmployeeBigLiteResource::collection($data));
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
            $filter_bill[] = ['is_person', True];
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
            return $this->FailedResponse(__('general.loadFailed'));
        } else {
            return $this->ok(new EmployeeResourceCollection($data));
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
            $employee->telegram = $request->telegramId;
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
            $employee->telegram = $request->telegramId;
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
        Log::alert("Delete Employee id");
        Log::alert($employee);
        $employee->delete();

        return $this->ok(null);
    }
}
