<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lineone.piniastudio.com/dashboards-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 14:30:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />

    <title>SMME Dashboard</title>
    <link rel="icon" type="image/png" href="{{asset('backend/images/Yowza_Icon_400px.png')}}" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}" />

    <!-- Javascript Assets -->
    <script src="{{asset('backend/js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
<!-- App preloader Removed-->


<!-- Page Wrapper -->
<div
    id="root"
    class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
    x-cloak
>
    <!-- Sidebar -->
   @include('partials_.sidebar')
    <!--Sidebar ends here -->

    <!-- App Header Wrapper-->
    @include('partials_.header')
    <!-- App Header Wrapper ends here -->

    <!-- Mobile Searchbar -->
   @include('partials_.mobile_search_bar')
    <!-- Mobile Searchbar ends here  -->

    <!-- Right Sidebar -->
 @include('partials_.right_bar')
    <!-- Right Sidebar  ends here -->
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
       @yield('main_content')
    </main>
</div>
<!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
<div id="x-teleport-target"></div>

<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
</body>
<!-- Mirrored from lineone.piniastudio.com/dashboards-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Mar 2024 14:30:37 GMT -->
</html>
