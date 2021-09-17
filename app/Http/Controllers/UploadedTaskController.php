<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UploadedTask;
use Illuminate\Http\Request;

class UploadedTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = UploadedTask::join("tasks","tasks.id","=","uploaded_tasks.taskId")
        ->select('tasks.*','uploaded_tasks.*','uploaded_tasks.id as ut_id','tasks.id as task_id')
        ->get();
        return $task;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UploadedTask::create($request->all());
        return "Submitted the proof of work";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UploadedTask  $uploadedTask
     * @return \Illuminate\Http\Response
     */
    public function show($uploadedTask)
    {
        return UploadedTask::join("tasks","tasks.id","=","uploaded_tasks.taskId")
        ->join("users","uploaded_tasks.userId","=","users.user_id")
        ->select('tasks.*','uploaded_tasks.*','uploaded_tasks.id as ut_id','tasks.id as task_id','users.name as user_name')
        ->where("uploaded_tasks.id","=",$uploadedTask)
        ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UploadedTask  $uploadedTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UploadedTask $uploadedTask)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UploadedTask  $uploadedTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadedTask $uploadedTask)
    {
        $uploadedTask->delete();

        return "Post approved deleted";
    }

    public function showTasks(Request $request){
        $task = UploadedTask::join("tasks","tasks.id","=","uploaded_tasks.taskId")
        ->select('tasks.*','uploaded_tasks.*','uploaded_tasks.id as ut_id','tasks.id as task_id')
        ->where('uploaded_tasks.userId',"=",$request->user_id)
        ->get();
        return $task;
    }
    public function leaderboard(){

        $user = User::orderBy('points','DESC')->get();
        return $user;
    }
    public function approve(Request $request){
        $uploadedTask = UploadedTask::where("id",$request->id)->first();
        if($uploadedTask->approved){
            return "you already approved this work";
        }
        $uploadedTask->update(['approved'=>true]);
        $task = Task::where("id",$uploadedTask->taskId)->first();
        $user = User::where("user_id",$uploadedTask->userId)->first();
        $user->update(["points"=>(int)$uploadedTask->points + (int)$task->points]);

        return "Approved";

    }
}
