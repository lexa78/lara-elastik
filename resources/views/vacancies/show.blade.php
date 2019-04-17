@extends('layout')

@section('title')
    Просмотр вакансии {{ $vacancy->title }}
@endsection

@section('content')
    <div class="card uper">
        <div class="card-header">
            {{ $vacancy->title }}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            {{ $vacancy->description }}
        </div>
        <a class="btn btn-info" href="{{ route('vacancies.index')}}">Назад</a>
    </div>
@endsection