@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- ここにページ毎のコンテンツを書く -->
<h3>No.{{ $nippo->id }}の詳細ページ</h3>

    @if (Auth::user()->id == $nippo->user_id)
        {!! Form::model($nippo, ['route' => ['nippoes.destroy', $nippo->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger float-right']) !!}
        {!! link_to_route('nippoes.edit', '編集する', ['id' => $nippo->id], ['class' => 'btn btn-light float-right']) !!}
        {!! Form::close() !!}
    @endif

    <table class="table table-sm">
        <tr>
            <th>書いた人</th>
            <td>{{ $nippo->user->name }}</td>
        </tr>
        <tr>
            <th>提出日</th>
            <td>{{ $nippo->created_at  }}</td>
        </tr>
        <tr>
            <th>今日の実績</th>
            <td>{{ $nippo->nippo }}</td>
        </tr>
    </table>
    
    <!-- ここにコメント投稿機能をつけたい -->
    
    {!! Form::model($comment, ['route' => 'comments.store']) !!}
    <h5>コメントする：</h5>
        <div class="form-group col-xs-4">
            <div style="display:inline-flex form-group-lg">{!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! Form::submit('コメントする', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::hidden('nippo_id', $nippo->id) !!}
        </div>
        
    {!! Form::close() !!}
 
    <h5>コメント最新一覧：</h5>
    <table class="table table-sm">
            <thead>
                <tr>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
    
    {{ $comments->render('pagination::bootstrap-4') }}

@endsection