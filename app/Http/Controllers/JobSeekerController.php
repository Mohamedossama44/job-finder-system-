<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\JobPost;
use Carbon\Carbon;


class JobSeekerController extends Controller
{
    public function jobsfeed()
    {
        $User=Users::select('name','email')->where('userID','=',session('LoggedUser'))->first();
        $Job=JobPost::select('jobTitle','jobDescription','name','deadline','categoryName','jobID','jobRequirements','jobLocation')
        ->join('users','users.userID','=','job_posts.companyID')
        ->join('job_categories','job_categories.categoryID','=','job_posts.categoryID')->where('job_posts.deadline','>',Carbon::now()->format('Y-m-d'))
        ->get();
        $userInfo['name'] =$User->name;
        $userInfo['email'] = $User->email;
        $userInfo['posts'] = $Job;
        return view('jobsfeed',$userInfo);
    }
}
