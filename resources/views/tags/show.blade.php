@extends('layouts.admin.main')

@section('title', 'Данные о теге "' . $tag->name . '"')

@section('h1', $tag->name)

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Теги</a></li>
        <li class="breadcrumb-item active">{{ $tag->name }}</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Информация о теге "{{ $tag->name }}"</h3>
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
                                <td>{{ $tag->id }}</td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td>{{ $tag->name }}</td>
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
