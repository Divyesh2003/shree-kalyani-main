{{-- Head --}}
@include('admin.partials.head')
<!-- BEGIN: Body-->
{{-- Mobile Menu --}}
{{-- @include('admin.partials.mobile') --}}
{{-- Top/Header --}}
{{-- Sidebar --}}
@include('admin.partials.header')
@include('admin.partials.sidebar')
<div class="layout-page">
    @include('admin.partials.nav')
<!-- BEGIN: Content -->
@yield('content')
<!-- END: Content -->
</div>
{{-- Footer --}}
@include('admin.partials.footer')
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}
{{-- @stack('scripts') --}}
</body>
<!-- END: Body-->
</html>