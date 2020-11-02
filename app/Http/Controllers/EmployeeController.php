<?php

namespace App\Http\Controllers;

use App\employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployeeWithPosition($position)
    {


        $employeeName = response()->json(employees::where('position', '=', $position)->get());
        return $employeeName;
    }

    public function getAllLocations()
    {
        $allLocations = response()->json(employees::lists('location'));
        return $allLocations;
    }
    public function showAllEmployee()
    {
        return response()->json(employees::all());
    }

    public function showOneEmployee($id)
    {

        return response()->json(employees::find($id));
    }


    public function create(Request $request)
    {
        $employee = employees::create($request->all());

        return response()->json($employee, 201);
    }

    public function update($id, Request $request)
    {
        $employee = employees::findOrFail($id);
        $employee->update($request->all());

        return response()->json($employee, 200);
    }

    public function delete($id)
    {
        employees::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
