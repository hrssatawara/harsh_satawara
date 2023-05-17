<?php

namespace App\Http\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{

    public function listEmployee(){
        return Employee::get();
    }

    public function addEmployee($input){
        $input['password'] = Hash::make($input['password']);
        return Employee::create($input);
    }


    public function updateEmployee($employee, $input){
        if (isset($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        return $employee->update($input);
    }

    public function deleteEmployee($employee){

        return $employee->delete();
    }
}
