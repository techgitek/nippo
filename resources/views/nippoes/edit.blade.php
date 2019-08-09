@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- ここにページ毎のコンテンツを書く -->
<h3>id: {{ $nippo->id }} の日報編集ページ</h3>

    <div class="row">
        <div class="col-6">
            {!! Form::model($nippo, ['route' => ['nippoes.update', $nippo->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('nippo', '日報:') !!}
                    {!! Form::textarea('nippo', null, ['class' => 'form-control input-lg textarea2']) !!}
                    
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-light']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection