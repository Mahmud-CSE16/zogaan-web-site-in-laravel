<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class CommentsController extends Controller
{
    public function addComment(Request $request,$work_details_id){
    
//      echo $id;
//       dd( $request->all());
        $user_id = Session::get('id');
        
        DB::insert('insert into comments (work_details_id, user_id, comment_content) values (?, ?, ?)', [$work_details_id , $user_id, $request->comment_content]);
        
       // return 'comment added';
       return redirect()->route('work_details.show', [$work_details_id]);
    }
}
