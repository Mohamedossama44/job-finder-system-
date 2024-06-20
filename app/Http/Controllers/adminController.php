<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $count = DB::table('users')->where('role', 2)->count();
        $cols = DB::table('users')->select('userID','name','email')->where('role',2)->get();
        $data['count'] = $count;
        $data['companies'] = $cols;
        return view ('admin.index',$data);
    }

    public function add()
    {
        // ADD NEW COMPANY FORM
        return view('admin.addCompany');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required||max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'confirmpassword' => 'required|same:password',
        ]);
        // insert data into database
        $user = new Users([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);
        $save = $user->save();
        if($save){
            return redirect()->route('adminRoute')->with('success', 'Company has been added successfully!');
        }else{
            return back()->with('fail', 'Something went wrong try again!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = DB::table('users')->where('userID', $id)->delete();
        return redirect()->route('adminRoute');
    }
}
