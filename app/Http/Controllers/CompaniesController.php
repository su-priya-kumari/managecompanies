<?php

namespace App\Http\Controllers;

use App\Models\companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CompaniesController extends Controller
{

    public function index()
    {
        // $c_data =DB::table('companies')->select('id','name')->get();
        $a = companies::pluck('name');
        // dd($a);
        $records = companies::paginate(10);
        return view('admin.companies', compact('a', 'records'));
    }

    // public function index()
    // {
    //     // $records =DB::table('companies')->paginate(5);
    //     $a = companies::pluck('name');
    //     // dd($a);
    //     $records = companies::paginate(5);
    //     return view('admin.companies', compact('a','records'));
    // }
    public function indexx()
    {
       
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'logo'=>'required|mimes:png,jpg|dimensions:min_width=100,min_height=100',
            'website'=>'required',
        ]);

        $filename = time(). "." .$request->logo->extension();       
        $request->logo->move(public_path('images'),$filename);

        companies::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'logo'=> $filename,
            'website'=> $request->website,
        ]);
        return redirect()->back()->with('message','Inserted Successfully');
    }

    public function show(companies $companies)
    {
        
    }

    public function edit(companies $companies, $id)
    {
        $records = companies::find($id);
        return view('admin.companyedit',compact('records','id'));
    }

    public function update(Request $request, companies $companies, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'website'=>'required',
        ]);

        $records = companies::find($id);
        $records->name = $request->input('name');
        $records->email = $request->input('email');
        $records->website = $request->input('website');
        $records->save();
        return redirect('/companies')->with('message', 'Profile updated!'); 
    }

    public function destroy($id)
    {
        $records = companies::find($id);
        $records->delete();
        return redirect()->back()->with('status','Deleted Successfully');
    }
}
