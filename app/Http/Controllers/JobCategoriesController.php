<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JobCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_categories = DB::select('select job_categories.id, job_categories.job_name, count(skilled_on.job_category_id) as numberOfWorker from job_categories left join skilled_on on (job_categories.id=skilled_on.job_category_id) group by job_categories.id, job_categories.job_name');
        
        
        $users = DB::select('select countJobCategory() as all_jobs');
        foreach($users as $usersCount){
            $job_count = $usersCount->all_jobs;
        }
        return view('admin.job_categories.job_categories',compact('job_categories','job_count'));
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
        DB::insert('insert into job_categories (job_name) values (?)', [$request->job_name]);
        return redirect('/job_categories');
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
        $results = DB::select('select * from job_categories where id = ?', [$id]);
        foreach($results as $result){
            $job_category = $result;
        }
        $job_categories = DB::select('select * from job_categories');
        
        return view('admin.job_categories.edit_job_category',compact('job_category','job_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         DB::update('update job_categories set job_name = ? where id = ?', [$request->job_name,$id]);
        return redirect('/job_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from job_categories where id=?',[$id]);
        //return $id;
        return redirect('/job_categories');
    }
}
