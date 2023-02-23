@extends('layouts.admin.main')

@section('title', 'Редактирование анкеты - ' . $questionnaire->name)

@section('h1', 'Редактировать анкету')

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('main') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Анкеты</a></li>
        <li class="breadcrumb-item active">Редактирование анкету</li>
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
                        <h3 class="card-title">Редактирование анкеты - {{ $questionnaire->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('questionnaires.update', $questionnaire->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $questionnaire->id }}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Имя</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $questionnaire->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Фото</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Загрузить фото</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Должность</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $questionnaire->job_title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea rows="4" class="form-control" id="description" name="description">{{ $questionnaire->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="department_id" class="col-sm-2 col-form-label">Отдел</label>
                                <div class="col-sm-10">
                                    <select type="text" class="form-control" id="department_id" name="department_id">
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{ $questionnaire->department_id == $department->id ? 'selected' : '' }}>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Теги</label>
                                <div class="col-sm-10">
                                    <select class="select2bs4" multiple="multiple" data-placeholder="Добавьте теги" style="width: 100%;" name="tags[]">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ (collect($questionnaire->tags->pluck('id'))->contains($tag->id)) ? 'selected':'' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
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

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/adminlte_3/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminlte_3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@push('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{asset('/adminlte_3/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('/adminlte_3/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/js/questionnaires.js')}}"></script>
@endpush
