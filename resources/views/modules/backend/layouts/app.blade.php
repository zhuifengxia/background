<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
@include('modules.backend.layouts.partials.htmlheader')
@show

        <!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini fixed">
<div class="wrapper">

    @include('modules.backend.layouts.partials.mainheader')

    @include('modules.backend.layouts.partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('modules.backend.layouts.partials.contentheader')

                <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

{{--    @include('modules.backend.layouts.partials.controlsidebar')--}}

    @include('modules.backend.layouts.partials.footer')

</div><!-- ./wrapper -->

@section('scripts')
    @include('modules.backend.layouts.partials.scripts')
@show

</body>
</html>
