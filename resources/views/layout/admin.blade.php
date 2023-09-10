@extends('layout.base')

@push('styles')
    <link href="{{ asset('assets/css/datatables.min.css') }}" rel="stylesheet" />
@endpush

@section('body')

<body class="sb-nav-fixed">
    @include('partials.navbar')
    <div id="layoutSidenav">
        @include('partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('partials.footer')
        </div>
    </div>
    @include('partials.scripts')
    {{-- Script for admin page only --}}
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.bootstrap5.min.js') }}"></script>

    <script>
        function logout() {
            swal({
                title: "Log out",
                text: "Are you sure you want to log out?",
                icon: "warning",
                buttons: [
                    'No, cancel it',
                    'Yes, I am sure'
                ],
                dangerMode: true,
            }).then((willLogout) => {
                if (willLogout) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        }
    </script>

    @stack('scripts')
</body>
@endsection
