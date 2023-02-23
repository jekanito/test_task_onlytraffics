@extends('layouts.admin.main')

@section('title', 'Данные анкеты "' . $questionnaire->name . '"')

@section('h1', $questionnaire->name)

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Анкеты</a></li>
        <li class="breadcrumb-item active">{{ $questionnaire->name }}</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Информация об отделе "{{ $questionnaire->name }}"</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 50%;">Свойство</th>
                                <th style="width: 50%;">Данные</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $questionnaire->id }}</td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td>{{ $questionnaire->name }}</td>
                            </tr>
                            <tr>
                                <td>Описание</td>
                                <td>{{ $questionnaire->description }}</td>
                            </tr>
                            <tr>
                                <td>Должность</td>
                                <td>{{ $questionnaire->job_title }}</td>
                            </tr>
                            <tr>
                                <td>Отдел</td>
                                <td>{{ $questionnaire->department->name }}</td>
                            </tr>
                            <tr>
                                <td>Фото</td>
                                <td>
                                    <img src="{{ $questionnaire->photo }}" alt="{{ $questionnaire->name }}" width="200">
                                </td>
                            </tr>
                            <tr>
                                <td>Теги</td>
                                <td>
                                    @foreach($questionnaire->tags as $tag)
                                        <small class="badge badge-success">{{ $tag->name }}</small>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
