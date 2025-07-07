@include('user.layouts.head')
</head>
  <body class="home-6">
    @include('user.components.navbar')
    @yield('content')
    @include('user.components.footer')
    @stack('scripts')
@include('user.layouts.tails')