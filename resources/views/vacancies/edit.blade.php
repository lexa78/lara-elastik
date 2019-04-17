@extends('layout')

@section('title')
    Редактирование вакансии {{ $vacancy->title }}
@endsection

@section('content')
    <div class="card uper">
        <div class="card-header">
            Редактирование вакансии {{ $vacancy->title }}
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
            <form method="post" action="{{ route('vacancies.update', $vacancy->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Заголовок вакансии:</label>
                    <input type="text" class="form-control" name="title" value="{{ $vacancy->title }}" />
                </div>
                <div class="form-group">
                    <label for="price">Описание вакансии:</label>
                    <textarea class="form-control" name="description" rows="10">{{ $vacancy->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection