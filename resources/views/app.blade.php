<!doctype html>
<html lang="en">
@include('includes.header')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        @include('includes.navbar')
        @include('includes.sidebar')
        @yield('content')
        @include('includes.footer')

    </div>



    @include('includes.js-cdn')
    @yield('scripts')
</body>

<!--end::Body-->

</html>
