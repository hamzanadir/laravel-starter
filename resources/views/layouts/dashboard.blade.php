<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts._parts.head')
@yield('style')

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper" id="app">

  @include('layouts._parts.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts._parts.main-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('header')
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  @include('layouts._parts.footer')

  <!-- Control Sidebar -->
  @include('layouts._parts.control-sidebar')
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

  @include('layouts._parts.script')
  @yield('script')
</body>
</html>
