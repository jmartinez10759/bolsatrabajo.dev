<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('layouts.admin.includes-header')
</head>
<body>
    <div id="wrapper" class="container-fluid">
        @include('layouts.admin.page-header')
        @include('layouts.admin.page-left')
        <main class="container-fluid">
            @yield('content')
        </main>
        @include('layouts.admin.page-footer')
    </div>
    @include('layouts.admin.includes-footer')
</body>
</html>
