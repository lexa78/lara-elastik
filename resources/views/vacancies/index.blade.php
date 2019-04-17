@extends('layout')

@section('title')
    Просмотр вакансий
@endsection
@section('content')
    <a class="btn btn-success" href="{{ route('vacancies.create')}}">Добавить вакансию</a>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Заголовок</td>
                <td>Описание</td>
                <td>Кол-во просмотров</td>
                <td colspan="3">Действия</td>
            </tr>
            </thead>
            <tbody>
            @foreach($vacancies as $vacancy)
                <tr>
                    <td>{{$vacancy->title}}</td>
                    <td>{{$vacancy->description}}</td>
                    <td>{{$vacancy->views}}</td>
                    <td><a href="{{ route('vacancies.show',$vacancy->id)}}" class="btn btn-info">Посмотреть</a></td>
                    <td><a href="{{ route('vacancies.edit',$vacancy->id)}}" class="btn btn-primary">Редактировать</a></td>
                    <td>
                        <form action="{{ route('vacancies.destroy', $vacancy->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $vacancies->render() }}
    </div>
@endsection