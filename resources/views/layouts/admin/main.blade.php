<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('layouts.admin.parts.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('layouts.admin.parts.navbar')

    @include('layouts.admin.parts.main_sidebar')

    @include('layouts.admin.parts.content')

    @include('layouts.admin.parts.control_sidebar')

    @include('layouts.admin.parts.footer')

</div>
<!-- ./wrapper -->

@include('layouts.admin.parts.scripts')
</body>
</html>
