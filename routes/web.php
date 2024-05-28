<?php

use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

//Route::get("test", function () {
//    $job = \App\Models\Job::first();
//    TranslateJob::dispatch($job);
//
//    return "Done";
//});
Route::view("/", "home");
Route::view("/contacts", "contact");
Route::controller(JobController::class)->group(function () {
    Route::get("/jobs", "index")->middleware("auth");
    Route::get("/jobs/create", "create")->middleware("auth");
    Route::get("/jobs/{job}", "show");
    Route::post("/jobs", "store")->middleware("auth");
    Route::get("/jobs/{job}/edit", "edit")
        ->middleware(["auth"])
        ->can("edit", "job");
    Route::patch("/jobs/{job}", "update")
        ->middleware(["auth"])
        ->can("edit", "job");
    Route::delete("/jobs/{job}", "destroy")
        ->middleware(["auth"])
        ->can("edit", "job");
});
//Auth
Route::get("/register", [RegisteredUserController::class, "create"]);
Route::post("/register", [RegisteredUserController::class, "store"]);

Route::get("/login", [SessionController::class, "create"])->name("login");
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"]);
