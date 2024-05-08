
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    @include('layouts.admin.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.admin.sidebar')

    @yield('content')

</div>
<!-- ./wrapper -->
    @include('layouts.admin.scripts')
</body>
</html>
