<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeuser_departmentRequest;
use App\Http\Requests\Updateuser_departmentRequest;
use App\Models\user_department;

class UserDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_department = user_department::all();
        return $user_department;
    }
public function getAssignment()
{
    $user_department = user_department::join('users', 'users.id', '=', 'user_departments.user_id')
            ->join('departments', 'departments.id', '=', 'user_departments.department_id')
            ->get(['user_departments.id as user_dep_id','departments.name as dep', 'departments.location as location', 'users.name as name', 'users.email as email', 'users.phone_number as phoneno']);
            
            return $user_department;
    # code...
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeuser_departmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_departmentRequest $request)
    {
        //
        $user_department = new user_department();
        $user_department->user_id = $request->user_id;
        $user_department->department_id = $request->department_id;
        $user_department->save();
        return response()->json('User assigned to department!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_department  $user_department
     * @return \Illuminate\Http\Response
     */

     public function getAssignmentByID($id)
     {

        $user_department = user_department::join('users', 'users.id', '=', 'user_departments.user_id')
        ->join('departments', 'departments.id', '=', 'user_departments.department_id')
        ->get(['user_departments.id as user_dep_id','departments.id as dep_id','departments.name as dep', 'departments.location as location', 'users.name as name', 'users.email as email', 'users.phone_number as phoneno'])
        ->where('user_dep_id', $id);
       // echo $user_department;
    return $user_department;
        # code...
     }
    public function show($id)
    {
        //
        $user_department = user_department::join('users', 'users.id', '=', 'user_departments.user_id')
        ->join('departments', 'departments.id', '=', 'user_departments.department_id')
        ->get(['user_departments.id as user_dep_id','departments.name as dep', 'departments.location as location', 'users.name as name', 'users.email as email', 'users.phone_number as phoneno'])
        ->where('user_dep_id', $id);
        return $user_department;
    }
    public function checkAssignment($user_id, $department_id)
    {
        $user_department = user_department::where([
            ['user_id',$user_id],
            ['department_id', $department_id]
        ])->get();
        $count = count($user_department);
        return $count;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_department  $user_department
     * @return \Illuminate\Http\Response
     */
    public function edit(user_department $user_department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_departmentRequest  $request
     * @param  \App\Models\user_department  $user_department
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_departmentRequest $request, $id)
    {
        //update users
        $user_department=user_department::find($id);
        $user_department->update($request->all());
        return response()->json('User Department updated!');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_department  $user_department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_department = user_department::find($id);
        $user_department->delete();
        return response()->json('Assignment deleted!');
    }
}
