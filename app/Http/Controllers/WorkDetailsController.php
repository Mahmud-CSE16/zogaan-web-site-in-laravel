<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class WorkDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_details = DB::select('select work_details.id, work_details.work_title,work_details.work_description,work_details.work_status,work_details.photo_path, users.name from work_details INNER JOIN users ON (users.id=work_details.user_id) ORDER BY work_details.id DESC ;');
        //dd($work_details);
        return view("admin/work_details/view_all_work_details",compact('work_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/work_details/add_work_details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo_path = 'post.png';
        if($file = $request->file('photo')){
            $photo_path = $file->getClientOriginalName();
            $file->move('images',$photo_path);
        }
        //dd($request->all());
        $user_id = Session::get('id');
        DB::insert('insert into work_details (user_id,work_title,work_description,work_status,work_urgency,photo_path) values (?,?,?,?,?,?)', [$user_id,$request->work_title,$request->work_description,'published',$request->work_urgency,$photo_path]);
        
        return redirect('/work_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = DB::select('select id, user_id, work_title, work_description, work_status, work_urgency,photo_path,(SELECT area_name FROM area WHERE id = (SELECT area_id FROM users WHERE users.id = work_details.user_id)) as area_name, (SELECT name FROM users WHERE users.id = work_details.user_id) as user_name from work_details where id = ?', [$id]);
        foreach($results as $result){
            $work_details = $result;
        }
        
        $comments = DB::select('select id, work_details_id, user_id, comment_content, (SELECT name FROM users WHERE users.id = comments.user_id) as user_name from comments where work_details_id = ? ORDER BY id DESC;', [$id]);
        
//  $results = DB::select('select work_details.id, work_details.work_title,work_details.work_description,work_details.work_status, users.name from work_details INNER JOIN users ON users.id=work_details.user_id and work_details.id=? ',[$id]);
        
        return view('post',compact('work_details','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = DB::select('select * from work_details where id = ?', [$id]);
        foreach($results as $result){
            $work_details = $result;
        }
        
        return view('admin/work_details/update_work_details',compact('work_details'));
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
        $photo_path = 'post.png';
        if($file = $request->file('photo')){
            $photo_path = $file->getClientOriginalName();
            $file->move('images',$photo_path);
        }
        DB::update('update work_details set work_title = ?,
                                            work_description = ?,
                                            work_urgency = ?,
                                            photo_path = ?
                                            where id = ?', [$request->work_title,$request->work_description,$request->work_urgency,$photo_path,$id]);
        return redirect('/work_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from work_details where id=?',[$id]);
        //return $id;
        return redirect('/work_details');
    }
}
