@extends('layouts.admin.main')

@section('title', 'Список отделов')

@section('h1', 'Отделы')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item active">Отделы</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ $message }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title py-1">Список отделов</h3>
                        <div class="card-tools">
                            <a href="{{ route('departments.create') }}" class="btn btn-sm btn-secondary">
                                Добавить отдел
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Описание</th>
                                <th style="width: 314px;">Действия</th>
                            </tr>
                            </thead>
                            <tboby>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{ $department->id }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->description }}</td>
                                        <td>
                                            <form action="{{ route('departments.destroy',$department->id) }}" method="POST">
                                                <a class="btn btn-success" href="{{ route('departments.show',$department->id) }}">Посмотреть</a>
                                                <a class="btn btn-primary" href="{{ route('departments.edit',$department->id) }}">Редактировать</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tboby>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Имя</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@include('plugins.datatable')
