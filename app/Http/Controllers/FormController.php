<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Applications;

class FormController extends Controller
{
    public function applyform($ID)
    {
        $get_database = JobPost::select('jobTitle')->where('jobID','=',$ID)->first();
        $data['name']= $get_database->jobTitle;
        $data['id'] =$ID;
        return view ('applyform',$data);
    }
    public function applyaction(Request $request,$ID)
    {
         // validate requests
         $request->validate([
            'name' => 'required||max:30',
            'email' => 'required|email',
            'phone' => 'required|digits:11',
            'faculty' => 'required',
            'grad' => 'required|integer|min:1980',
            'experience' => 'required',
            'coverletter' => 'required',
        ]);
        // insert data into database
        $application = new Applications([
            'jobPostID' => $ID,
            'jobSeekerID' => session('LoggedUser'),
            'applicantName' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phone,
            'faculty' => $request->faculty,
            'graduationYear' => $request->grad,
            'experience' => $request->experience,
            'coverLetter' => $request->coverletter,
        ]);
        $save = $application->save();
        if($save){
            return back()->with('success', 'Application registered successfully!');
        }else{
            return back()->with('fail', 'Something went wrong try again later!');
        }
    }
}
