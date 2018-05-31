<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('layouts.includes-header')
</head>
<body>
    <div id="app" class="wrapper">
        @include('layouts.page-header')
        <main >
            @yield('content')
        </main>
        @include('layouts.page-footer')
    @include('layouts.includes-footer')
    </div>
</body>
</html>
