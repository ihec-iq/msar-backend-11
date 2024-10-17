<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\Employee\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function store(UpdateEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        
        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee], 201);
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->validated());
        
        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
    }
}
