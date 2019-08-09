@extends('layouts.app')

@section('content')
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h3>受信箱</h3>
    {!! link_to_route('nippoes.create', '新規日報の作成', null, ['class' => 'btn btn-primary float-right']) !!}

    @if (count($nippoes) > 0)
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>日報No</th>
                    <th>提出した人</th>
                    <th>提出時刻</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nippoes as $nippo)
                <tr class="active">
                    <td>{!! link_to_route('nippoes.show', $nippo->id, ['id' => $nippo->id]) !!}</td>
                    <td>{{ $nippo->user->name }}</td>
                    <td>{{ $nippo->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
     @endif
        

      <ul class="pagination justify-content-center">
        {{ $nippoes->render('pagination::bootstrap-4') }}
      </ul>

@endsection

