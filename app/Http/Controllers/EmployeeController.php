<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use DataTables;

class EmployeeController extends Controller
{
    public function getEmployeeDT() {
        return  DataTables::of(Employee::all())->make(true);
    }
    
    public function index() {
        return view('employee/index');
    }

    public function setEmployeeID() {
        $getLastId = Employee::orderBy('employee_id', 'desc')->first()->employee_id;

        if(!$getLastId) {
            $id = "EMP001";
        }else {
            $toIncrement = substr($getLastId, -3);
            $increment =  (float)$toIncrement + 1;
            $id = "EMP".sprintf("%03d", $increment);
        }

        return $id;
    }
    public function createEmployee(Request $request) { 
        $input = $request->input();
        $id = $this->setEmployeeID();
        $firstname = $input['firstname'];
        $lastname = $input['lastname'];
        $dob = $input['dob'];
        $gender = $input['gender'];
        $joiningDate = date("Y-m-d h:i:s ");
        $isActive = true;


        try {
            $employee = new Employee();
            $employee->employee_id = $id;
            $employee->firstname = $firstname;
            $employee->lastname = $lastname;
            $employee->dob = $dob;
            $employee->gender = $gender;
            $employee->joining_date = $joiningDate;
            $employee->is_active = $isActive;
            $employee->save();
            echo "<script>alert('Employee Created')</script>";
            return redirect('/employee')->with('status', 'Employee Created');
        }
        catch(Exception $e) {
            echo "<script>alert('$e')</script>";
            return redirect('/employee/create')->with('status', 'Create Failed');

        }
    }
}
