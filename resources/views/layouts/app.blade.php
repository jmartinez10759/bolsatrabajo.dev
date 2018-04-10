<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('layouts.includes-header')
</head>
<body>
    <div id="app" class="container-fluid">
        @include('layouts.page-header')
        <main class="container-fluid">
            @yield('content')
        </main>
        @include('layouts.page-footer')
    </div>
    @include('layouts.includes-footer')
</body>
</html>
