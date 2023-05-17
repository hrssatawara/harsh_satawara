<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Services\EmployeeService;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends BaseController
{
    public EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $employees = $this->employeeService->listEmployee();
        return $this->sendResponse(new EmployeeResource($employees), 'Employee Fetched Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployeeRequest $request
     * @return JsonResponse
     */
    public function store(StoreEmployeeRequest $request): JsonResponse
    {
//        dd('ss');
        $employee = $this->employeeService->addEmployee($request->validated());

        return $this->sendResponse(new EmployeeResource($employee), 'Employee Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function show(Employee $employee)
    {
        return $this->sendResponse(new EmployeeResource($employee), 'Employee Updated Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployeeRequest $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $update = $this->employeeService->updateEmployee($employee, $request->validated());
        if ($update) {
            return $this->sendResponse(new EmployeeResource($employee), 'Employee Updated Successfully.');
        } else {
            return $this->sendError('Error in updating employee');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee)
    {
        $delete = $this->employeeService->deleteEmployee($employee);
        if ($delete) {
            return $this->sendResponse([], 'Employee Deleted Successfully.');
        } else {
            return $this->sendError('Error in updating employee');
        }
    }
}
