<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>S M S</title>
     <link rel="shortcut icon" href="{{{ asset('favicon2.png') }}}">
     {{-- //logo in slidebars  |  --}}
    <link rel="stylesheet" href="{{ asset('css/compiled/theme.css') }}">
    {{-- messanger is for alert confirm things  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/messenger/messenger.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/messenger/messenger-theme-flat.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/ionicons.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  </head>
  <body>
    <div id="app"></div>
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/messenger/messenger.min.js') }}"></script>
    <script src="{{ asset('js/vendor/messenger/messenger-theme-flat.js') }}"></script>
    <script src="{{ asset('react/bundle.js') }}"></script>
  </body>
</html>
