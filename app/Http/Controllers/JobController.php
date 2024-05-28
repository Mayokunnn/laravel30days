<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

class JobController extends Controller
{
    //
    public function index()
    {
        return view("jobs.index", [
            "jobs" => Job::with("employer")->latest()->paginate(30),
        ]);
    }

    public function create()
    {
        return view("jobs.create");
    }

    public function store()
    {
        //...validate
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required", 'starts_with:$'],
        ]);

        $job = Job::create([
            "title" => request("title"),
            "salary" => request("salary"),
            "employer_id" => 1,
        ]);

        Mail::to($job->employer->user->email)->queue(new JobPosted($job));

        return redirect("/jobs");
    }

    public function show(Job $job)
    {
        return view("jobs.show", ["job" => $job]);
    }

    public function edit(Job $job)
    {
        if (Auth::guest()) {
            return redirect("/login");
        }

        //        Auth::user()->can("edit-job", $job);

        //        Gate::authorize("edit-job", $job);

        return view("jobs.edit", ["job" => $job]);
    }

    public function update(Job $job)
    {
        //...authorize TODO:Come back for this

        //...validate
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required", 'starts_with:$'],
        ]);

        //... Update the job

        $job->update([
            "title" => request("title"),
            "salary" => request("salary"),
        ]);

        //And persist
        //Redirect to the job page
        return redirect("/jobs/" . $job->id);
    }

    public function destroy(Job $job)
    {
        //...authorize TODO:Come back for this

        //    delete
        $job->delete();

        //    redirect
        return redirect("/jobs");
    }
}
