@extends('layouts.admin.main')

@section('title', 'Редактирование отдела - ' . $department->name)

@section('h1', 'Редактировать отдел')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Отделы</a></li>
        <li class="breadcrumb-item active">Редактирование отдела</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ $error }}
                            </li>
                        @endforeach
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Редактирование отдела - {{ $department->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('departments.update', $department->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $department->id }}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Имя</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea rows="4" class="form-control" id="description" name="description">{{ $department->description }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="Редактировать">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
