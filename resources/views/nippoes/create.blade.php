@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h3>日報新規作成ページ</h3>

    <div class="row">
        <div class="col-6">
            {!! Form::model($nippo, ['route' => 'nippoes.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('nippo', '日報:') !!}
                    <textarea class="form-control input-lg textarea2" name="nippo"></textarea>
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection