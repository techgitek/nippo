<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nippoe;
use App\User;
use App\Comment;

class NippoesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $nippoes = Nippoe::orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'nippoes' => $nippoes,
            ];
            return view('nippoes.index', $data);
        }
        return view('welcome', $data);
    }

    public function create()
    {
        $nippo = new Nippoe;
        return view('nippoes.create', [
            'nippo' => $nippo,
        ]);
    }

    public function store(Request $request)
    {
        //メイン
        $nippo = new Nippoe;
        $nippo->nippo= $request->nippo;
        
        //ユーザIDを一緒に入れる
        $user = \Auth::user();
        $nippo->user_id= $user->id;
        
        //時刻は勝手に入るのかな？
        $nippo->save();
        
        return redirect('/');
    }

    //showでcommentが定義されていないと怒られるのでここに追加　してもいいのか？
    public function show($id)
    {
        $nippo = Nippoe::find($id);
        $comment = new Comment;
        
        $comments = $nippo->comments()->orderBy('id', 'desc')->paginate(10);
        
        return view('nippoes.show', [
            'nippo' => $nippo,
            'comment' => $comment,
            
            'comments' => $comments,
        ]);
        
        /*
        $comment = new Comment;
        return view('nippoes.create', [
            'comment' => $comment,
        ]);
        */
    }
    
    //編集
    public function edit($id)
    {
        $nippo = Nippoe::find($id);
        
        //編集は自分だけ
        if (\Auth::id() === $nippo->user_id) {
            return view('nippoes.edit', [
                'nippo' => $nippo,
            ]);
        }
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nippo' => 'required|max:191',
        ]);
        
        $nippo = Nippoe::find($id);
        
        if (\Auth::id() === $nippo->user_id) {
            $nippo->nippo = $request->nippo;
            $nippo->save();
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        $nippo = \App\Nippoe::find($id);

        if (\Auth::id() === $nippo->user_id) {
            $nippo->comments()->delete();
            $nippo->delete();
        }
        
        return redirect('/');
    }

}
