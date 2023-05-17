<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Services\EmployeeService;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function dashboard(){
        $employee = Employee::get()->count();
        $today = Carbon::now();
//        dd($today->format('m'),$today->format('d'));
        $birthdays = Employee::where(function ($query) use ($today){
            $query->whereMonth('birthdate',$today->format('m'));
            $query->whereDay('birthdate',$today->format('d'));
        })->select(['first_name','last_name'])->get();

        $upcomings = Employee::where(function ($query) use ($today){
            $query->whereMonth('birthdate',$today->format('m'));
            $query->whereDay('birthdate','<>',$today->format('d'));
        })->select(['first_name','last_name'])->get();
        return view('admin.index',compact('employee','birthdays','upcomings'));
    }

    public function listEmployee()
    {
        $employees = Employee::get();
        return view('admin.employee.list',compact('employees'));
    }

    public function createEmployee()
    {
        return view('admin.employee.create');
    }

    public function storeEmployee(StoreEmployeeRequest $request)
    {
        $this->employeeService->addEmployee($request->validated());
        return redirect()->route('admin.employee.index')->with('success','Employee has been added successfully.');
    }

    public function editEmployee(Employee $employee)
    {
        return view('admin.employee.create',compact('employee'));

    }

    public function updateEmployee(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->employeeService->updateEmployee($employee,$request->validated());
        return redirect()->route('admin.employee.index')->with('success','Employee has been updated successfully.');
    }

    public function deleteEmployee(Employee $employee)
    {
        $this->employeeService->deleteEmployee($employee);
        return redirect()->route('admin.employee.index')->with('success','Employee has been deleted successfully');
    }
}
