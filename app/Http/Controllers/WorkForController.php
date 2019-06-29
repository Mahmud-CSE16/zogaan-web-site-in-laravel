<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WorkForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_for = DB::select('select work_details.id, work_details.work_title, work_details.work_status, (SELECT name FROM users WHERE users.id = work_for.user_id) as service_provider_name, work_for.payment, work_for.ratting from work_details INNER JOIN work_for ON (work_details.id=work_for.work_details_id) ORDER BY work_details.id DESC ;');
        //dd($work_details);
        return view("admin/work_for/view_all_work_for",compact('work_for'));
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
        //
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
    public function update(Request $request, $id)
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
        //
    }
    
    
    public function workDeal($user_id ,$work_details_id){
        DB::insert('insert into work_for (user_id,work_details_id,ratting,payment) values (?, ?, ?, ?)', [$user_id,$work_details_id,0,100]);
        
        DB::update('update work_details set work_status =?
                                            where id = ?', ['work_pending',$work_details_id]);
        return redirect('/work_for');
    }
}
