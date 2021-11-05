<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Models\companies;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    
    public function index()
    {   $c_data = DB::table('companies')->select('id','name')->get();
        // $a = companies::pluck('name');
        // dd($a);
        $records = employees::paginate(10);
        return view('admin.employees', compact('c_data', 'records'));
    }

    public static function fetch(){
        return companies::select('name')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);

        employees::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'company'=> $request->company,
            'email'=> $request->email,
            'phone'=> $request->phone,
        ]);
        return redirect()->back()->with('message','Inserted Successfully');
    }

    public function show(employees $employees)
    {
        //
    }

    public function edit(employees $employees, $id)
    {
        $records = employees::find($id);
        return view('admin.employeesedit',compact('records','id'));
    }

    public function update(Request $request, employees $employees, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'company'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);

        $records = employees::find($id);
        $records->first_name = $request->input('first_name');
        $records->last_name = $request->input('last_name');
        $records->company = $request->input('company');
        $records->email = $request->input('email');
        $records->phone = $request->input('phone');
        $records->save();
        return redirect('/employees')->with('message', 'Profile updated!'); 
    }

    public function destroy($id)
    {
        $records = employees::find($id);
        $records->delete();
        return redirect()->back()->with('status','Deleted Successfully');
    }
}
