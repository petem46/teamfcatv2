<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'TeamFCAT') }}</title>

  <script src="{{ mix('js/manifest.js') }}" Cache-Control: no-cache, must-revalidate defer></script>
  <script src="{{ mix('js/vendor.js') }}" Cache-Control: no-cache, must-revalidate defer></script>
  <script src="{{ mix('js/app.js') }}" Cache-Control: no-cache, must-revalidate defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-2JENXZFEMQ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2JENXZFEMQ');
  </script>

  <!-- MDI Icons -->
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
  <div id="app">
    {{-- <main class="py-4"
      style="padding-bottom: 56px !important; background-color: #121212 !important"> --}}
      @yield('content')
      {{-- </main> --}}
  </div>
</body>

</html>
