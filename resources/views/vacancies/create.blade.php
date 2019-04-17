@extends('layout')

@section('title')
    Создание новой вакансии
@endsection
@section('content')
    <div class="card uper">
        <div class="card-header">
            Создание вакансии
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
            <form method="post" action="{{ route('vacancies.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Заголовок вакансии:</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="price">Описание вакансии:</label>
                    <textarea class="form-control" name="description" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection