@extends('layouts.admin.main')

@section('title', 'Данные об отделе "' . $department->name . '"')

@section('h1', $department->name)

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Отделы</a></li>
        <li class="breadcrumb-item active">{{ $department->name }}</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Информация об отделе "{{ $department->name }}"</h3>
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
                                <td>{{ $department->id }}</td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td>{{ $department->name }}</td>
                            </tr>
                            <tr>
                                <td>Описание</td>
                                <td>{{ $department->description }}</td>
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
