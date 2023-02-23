@extends('layouts.admin.main')

@section('title', 'Список тег')

@section('h1', 'Теги')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item active">Теги</li>
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
                            <div class="card-tools">
                                <a href="{{ route('tags.create') }}" class="btn btn-sm btn-secondary">
                                    Добавить тег
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
                                    <th style="width: 314px;">Действия</th>
                                </tr>
                                </thead>
                                <tboby>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->id }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>
                                                <form action="{{ route('tags.destroy',$tag->id) }}" method="POST">
                                                    <a class="btn btn-success" href="{{ route('tags.show',$tag->id) }}">Посмотреть</a>
                                                    <a class="btn btn-primary" href="{{ route('tags.edit',$tag->id) }}">Редактировать</a>
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
