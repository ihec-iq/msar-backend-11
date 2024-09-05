<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hr\HrDocumentResource;
use App\Http\Resources\Hr\HrDocumentResourceCollection;
use App\Models\Employee;
use App\Models\HrDocument;
use App\Enum\EnumTypeChoseShareDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HrDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->ok(HrDocumentResource::collection(HrDocument::all()));
    }

    public function filter(Request $request)
    {
        //Log::alert($request);
        $request->filled('limit') ? $limit = $request->limit : $limit = 10;

        $data = HrDocument::orderBy('id', 'desc');


        if (!$request->isNotFilled('employeeName') && $request->employeeName != '' && $request->employeeName != null) {
            $data = $data->orWhereRelation('Employee', 'name', 'like', '%' . $request->employeeName . '%');
            $data = $data->orWhere('title', 'like', '%' . $request->employeeName . '%');
        }

        if (!$request->isNotFilled('employeeId') && $request->employeeId != 0 && $request->employeeId != null) {
            $data = $data->Where('employee_id', '=', $request->employeeId);
        }
        $data = $data->paginate($limit); //return $data;
        if (empty($data) || $data == null) {
            return $this->FailedResponse(__('general.loadFailed'));
        } else {
            return $this->ok(new HrDocumentResourceCollection($data));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function addHrDocument(Request $request, $employeeId): HrDocument
    {
        $data = HrDocument::create([
            'title' => $request->title,
            'issue_date' => $request->issueDate,
            'employee_id' => $employeeId,
            'hr_document_type_id' => $request->hrDocumentTypeId,
            'add_days' => $request->addDays,
            'user_create_id' => Auth::user()->id,
            'user_update_id' => Auth::user()->id,
        ]);
        if ($request->hasFile('files')) {
            $document = new DocumentController();
            $document->store_multi_hr(
                request: $request,
                documentable_id: $data->id,
                documentable_type: HrDocument::class,
                pathFolder: $employeeId
            );
        }
        return $data;
    }
    public function store(Request $request)
    {
        if ($request->chosePushBy == EnumTypeChoseShareDocument::None->value || $request->chosePushBy == EnumTypeChoseShareDocument::ToEmployee->value) {
            $data = $this->addHrDocument(request: $request, employeeId: $request->employeeId);
        } elseif ($request->chosePushBy == EnumTypeChoseShareDocument::ToSection->value) {
            $filter_bill[] = ['section_id', '=', $request->selectedSectionId];
            $EmployeesBySection = Employee::where($filter_bill)->get();
            foreach ($EmployeesBySection as $key => $employee) {
                $data = $this->addHrDocument(request: $request, employeeId: $employee->id);
            }

        } elseif ($request->chosePushBy == EnumTypeChoseShareDocument::ToAllEmployees->value) {
            $EmployeesBySection = Employee::all();
            foreach ($EmployeesBySection as $key => $employee) {
                $data = $this->addHrDocument(request: $request, employeeId: $employee->id);
            }
        } elseif ($request->chosePushBy == EnumTypeChoseShareDocument::ToCustom->value) {
            $EmployeesBySection = json_decode($request->SelectedEmployeesData);
            foreach ($EmployeesBySection as $key => $employee) {
                $data = $this->addHrDocument(request: $request, employeeId: $employee->id);
            }
        }
        // Log::alert($data);
        // $data = HrDocument::find($data->id);

        return $this->ok(new HrDocumentResource($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->ok(new HrDocumentResource(HrDocument::find($id)));

    }

    public function hrDocumentReportByEmployee($employeeId)
    {
        $data = HrDocument::orderBy('issue_date', 'desc')
            ->where('employee_id', '=', $employeeId)
            ->get();
        $result = '';

        $data = json_decode((HrDocumentResource::collection($data))->toJson(), true);



        foreach ($data as $key => $value) {
            $result .=
                "تسلسل الملف :#  " . $value['id'] . PHP_EOL .
                "اسم الكتاب " . $value['title'] . PHP_EOL .
                "نوع الكتاب " . $value['Type']['name']. PHP_EOL .
                "تاريخ الكتاب " . $value['issueDate'] . PHP_EOL .
                "المرافقات " . PHP_EOL ;

            foreach ($value['Files'] as $keyFile => $file) {
                $result .= "الملف  " .$keyFile. PHP_EOL ;
                $result .= "الرابط  " .$file['path']. PHP_EOL ;
                $filePath = $file['path'];
            }
            $result .= "--------------------------------------------------". PHP_EOL;
        }
        // Log::alert($data);
        //Log::alert("hrDocumentReportByEmployee : " . $result);
        return $result;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = HrDocument::find($id);
        $employeeId = $request->employeeId;

        $data->title = $request->title;
        $data->issue_date = $request->issueDate;
        $data->employee_id = $request->employeeId;
        $data->hr_document_type_id = $request->hrDocumentTypeId;
        $data->add_days = $request->addDays;
        $data->user_update_id = Auth::user()->id;

        $data->save();
        //$data = HrDocument::find($data->id);

        if ($request->hasFile('files')) {
            $document = new DocumentController();
            $document->store_multi_hr(
                request: $request,
                documentable_id: $id,
                documentable_type: HrDocument::class,
                pathFolder: $employeeId
            );
        }
        return $this->ok(new HrDocumentResource($data));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->ok(HrDocument::find($id)->delete());
    }
}
