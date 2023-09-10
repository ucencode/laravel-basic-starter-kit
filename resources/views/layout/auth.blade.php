@extends('layout.base')

@section('body')
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                @yield('content')
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            @include('partials.footer')
        </div>
    </div>
    @include('partials.scripts')
</body>
@endsection
