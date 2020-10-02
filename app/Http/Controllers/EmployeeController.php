<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use DataTables;

class EmployeeController extends Controller
{
    public function json() {
        return  DataTables::of(Employee::all())->make(true);
    }
    
    public function index() {
        return view('employee/index');
    }






    // public function index(Request $request) {
    //     $columns = array (
    //         // datatable column index => database column name
    //         0 =>'employee_id',
    //         1 =>'firstname',
    //         2 =>'lastname',
    //         3 =>'dob',
    //         4 =>'gender',
    //         5 =>'joining_date'
    //     );
    // //Getting the data
    // $employees = DB::table( 'employees' );
    // $totalData = $employees->count ();            //Total record
    // $totalFiltered = $totalData;      // No filter at first so we can assign like this
    // // Here are the parameters sent from client for paging 
    // $start = $request->input ( 'start' );           // Skip first start records
    // $length = $request->input ( 'length' );   //  Get length record from start
    // /*
    //  * Where Clause
    //  */
    // if ($request->has ( 'search' )) {
    //     if ($request->input ( 'search.value' ) != '') {
    //         $searchTerm = $request->input ( 'search.value' );
    //         /*
    //         * Seach clause : we only allow to search on user_name field
    //         */
    //         $employees->where ( 'firstname', 'Like', '%' . $searchTerm . '%' );
    //     }
    // }
    
    // /*
    //  * Order By
    //  */
    // // if ($request->has ( 'order' )) {
    // //     if ($request->input ( 'order.0.column' ) != '') {
    // //         $orderColumn = $request->input ( 'order.0.column' );
    // //         $orderDirection = $request->input ( 'order.0.dir' );
    // //         $jobs->orderBy ( $columns [intval ( $orderColumn )], $orderDirection );
    // //     }
    // // }
    // // Get the real count after being filtered by Where Clause
    // // $totalFiltered = $users->count ();
    // // // Data to client
    // // $jobs = $users->skip ( $start )->take ( $length );

    // /*
    //  * Execute the query
    //  */
    // $employees = $employees->get ();
    // /*
    // * We built the structure required by BootStrap datatables
    // */
    // $data = array ();
    // foreach ( $employees as $employee ) {
    //     $nestedData = array ();
    //     $nestedData ['employee_id'] = $employee->employee_id;
    //     $nestedData ['firstname'] = $employee->firstname;
    //     $nestedData ['lastname'] = $employee->lastname;
    //     $nestedData ['dob'] = $employee->dob;
    //     $nestedData ['gender'] = $employee->gender;
    //     $nestedData ['joining_date'] = $employee->joining_date;
    //     $data [] = $nestedData;
    // }
    // /*
    // * This below structure is required by Datatables
    // */ 
    // $content = array (
    //         "draw" => intval ( $request->input ( 'draw' ) ), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
    //         "recordsTotal" => intval ( $totalData ), // total number of records
    //         "recordsFiltered" => intval ( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
    //         "data" => $data
    // );
    // $content = json_encode($content);
    // // var_dump($content);
    // return view('employee/index', compact('content'));
    // }
    //
}
