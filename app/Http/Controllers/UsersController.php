<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//          $users = DB::select('select * from users');
//          $users = DB::table('users')->count();
//        
//         echo $users;
//        
//        foreach($users as $user){
//            echo $user->name .'</br>';
//            echo $user->email;
//        }
        
//        $users = DB::table('users')
//                     ->select(DB::raw('count(*) as user_count'))
//                     ->get();
        $users = DB::select('select count(*) as user_count from users');
        foreach($users as $usersCount){
            $user_count = $usersCount->user_count;
        }
        
//        $users = DB::select('SELECT LAST_INSERT_ID() as id');
//        foreach($users as $user){
//            echo $user->id;
//        }
        
        $users = DB::select('SELECT users.id, users.name, users.email, users.phone_no, area.area_name, users.address, users.role FROM users INNER JOIN area ON users.area_id=area.id ');
        return view('admin.users.view_all_user',compact('users','user_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_categories = DB::select('select * from job_categories');
        $areas = DB::select('select * from area');
        return view('admin.users.add_user',compact('job_categories','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['password'] = bcrypt($request->password);
        
        DB::insert('insert into users (name, email, phone_no, role, area_id, address, password) values (?, ?, ?, ?, ?, ?, ?)', [$request->name , $request->email, $request->phone_no, 'service_receiver', $request->area_id, $request->address, $request->password]);
        
        $users = DB::select('SELECT LAST_INSERT_ID() as id');
        foreach($users as $user){
            $user_id = $user->id;
        }
        
        foreach($request->checkBoxArray as $job_categoriy_id){
            DB::insert('insert into skilled_on (user_id,job_category_id) values (?,?)', [$user_id,$job_categoriy_id]);
        }
        
        return redirect('/users');
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
        $results = DB::select('select * from users where id = ?', [$id]);
        foreach($results as $result){
            $user = $result;
        }
        $job_categories = DB::select('select * from job_categories');
        $areas = DB::select('select * from area');
        
        return view('admin.users.update_user',compact('user','job_categories','areas'));
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
        $request['password'] = bcrypt($request->password);
        DB::update('update users set name = ?,
                                     email = ?,
                                     phone_no = ?,
                                     role = ?,
                                     area_id = ?,
                                     address = ?,
                                     password =?
        where id = ?', [$request->name , $request->email, $request->phone_no, $request->user_role, $request->area_id, $request->address, $request->password, $id]);
        
        DB::delete('delete from skilled_on where user_id=?',[$id]);
        
        foreach($request->checkBoxArray as $job_categoriy_id){
            DB::insert('insert into skilled_on (user_id,job_category_id) values (?,?)', [$id,$job_categoriy_id]);
        }
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from users where id=?',[$id]);
        //return $id;
        return redirect('/users');
    }
}
