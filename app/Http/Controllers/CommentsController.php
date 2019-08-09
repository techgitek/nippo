<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nippoe;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    /*
    public function create()
    {
        $comment = new Comment;
        return view('nippoes.create', [
            'comment' => $comment,
        ]);
    }
    */

    public function store(Request $request)
    {
        //メイン
        $comment = new Comment;
        $comment->comment= $request->comment;
        
        //日報IDを一緒に入れる
        //$nippo = 
        //$comment->nippoes_id= $nippo->id;
        $comment->nippo_id= $request->nippo_id;
        
        //時刻は勝手に入るのかな？
        $comment->save();
        return back();
        //return redirect('/nippoes');
    }
    
    /*
    public function show($id)
    {
        $nippo = Nippoe::find($id);
        return view('nippoes.show', ['nippo' => $nippo,]);
    }
    */
}
