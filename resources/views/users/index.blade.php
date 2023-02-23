@extends('layouts.admin.main')

@section('title', 'Список пользователей')

@section('h1', 'Пользователи')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item active">Пользователи</li>
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
                        <h3 class="card-title py-1">Список тегов</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Логин телеграм</th>
                                <th>Телеграм ID</th>
                                <th>Активный</th>
                                <th style="width: 100px;">Действия</th>
                            </tr>
                            </thead>
                            <tboby>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->telegram_user_login ?? 'Нет логина' }}</td>
                                        <td>{{ $user->telegram_user_id }}</td>
                                        <td>{{ $user->active ? 'Да' : 'Нет' }}</td>
                                        <td>
                                            <form action="{{ route('users.activate',$user->id) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button {{ $user->active ? 'disabled' : '' }} type="submit" class="btn btn-primary" onclick="return confirm('Вы уверены?')">Активировать</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tboby>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Имя</th>
                                <th>Логин телеграм</th>
                                <th>Телеграм ID</th>
                                <th>Активный</th>
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
