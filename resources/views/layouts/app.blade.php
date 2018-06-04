<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   @include('layouts.includes-header')
</head>
<body>
  @include('layouts.page-header')
    <div id="app" class="wrapper">
        <main >
            @yield('content')
        </main>
    </div>
    @include('layouts.page-footer')
    @include('layouts.includes-footer')
</body>
</html>
