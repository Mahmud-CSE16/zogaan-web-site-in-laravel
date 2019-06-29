<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = DB::select('call selectAllareas;');
        
        //dd($areas);
        
        $users = DB::select('call countAreas;');
        foreach($users as $usersCount){
            $area_count = $usersCount->all_areas;
        }
        return view('admin.areas.areas',compact('areas','area_count'));
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
        DB::insert('insert into area (area_name) values (?)', [$request->area_name]);
        return redirect('/areas');
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
        $results = DB::select('select * from area where id = ?', [$id]);
        foreach($results as $result){
            $area = $result;
        }
        $areas = DB::select('select * from area');
        
        return view('admin.areas.edit_area',compact('area','areas'));
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
        DB::update('update area set area_name = ? where id = ?', [$request->area_name,$id]);
        return redirect('/areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from area where id=?',[$id]);
        //return $id;
        return redirect('/areas');
    }
}
