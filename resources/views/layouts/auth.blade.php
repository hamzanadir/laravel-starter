<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts._parts.head_auth')
@yield('style')

<body class="hold-transition login-page">

  <div class="login-box" id="app">
    @yield('content')
  </div>
<!-- /.login-box -->

  @yield('script')
</body>
</html>
