@extends('layouts.admin.auth')

@section('title', 'AdminLTE 3 | Log in')

@push('styles')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('/adminlte_3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endpush

@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @if ($errors->any())
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ $errors->first() }}
                    </div>
                @endif
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login_post') }}" method="post" id="login-form">
                    @csrf
                    <input type="hidden" id="telegram-user-id" name="telegram_user_id" value="">
                    <input type="hidden" id="telegram-user-login" name="telegram_user_login" value="">
                    <input type="hidden" id="name" name="name" value="">
                </form>
                <div class="social-auth-links text-center mb-3">
                    <script async src="https://telegram.org/js/telegram-widget.js?21" data-telegram-login="{{ env('BOT_ADMIN_NAME') }}" data-size="large" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                    <script type="text/javascript">
                        function onTelegramAuth(user) {
                            $('#telegram-user-id').val(user.id);
                            let username = user.username ? user.username : '';
                            $('#telegram-user-login').val(username);
                            $('#name').val(user.first_name + ' ' + (user.last_name ? user.last_name : ''));
                            $('#login-form').submit();
                        }
                    </script>
                </div>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    @include('layouts.admin.parts.scripts')
    </body>
@endsection
