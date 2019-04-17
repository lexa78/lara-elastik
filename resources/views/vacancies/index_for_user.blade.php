@extends('layout')

@section('title')
    Просмотр вакансий
@endsection
@section('content')
    <a class="btn btn-success" href="{{ route('vacancies.index')}}">В админку</a>
    <div class="uper">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Заголовок</td>
                <td>Описание</td>
                <td>Кол-во просмотров</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($vacancies as $vacancy)
                <tr>
                    <td>{{$vacancy->title}}</td>
                    <td>{{$vacancy->description}}</td>
                    <td>{{$vacancy->views}}</td>
                    <td><a href="{{ route('showVacancy',$vacancy->id)}}" class="btn btn-info">Посмотреть</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $vacancies->render() }}
    </div>
@endsection