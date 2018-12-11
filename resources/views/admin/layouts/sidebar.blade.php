<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @include('admin.layouts.sidehead');
        {!! $mainPresenter->renderSidebar($menus,$route) !!}
    </section>
    <!-- /.sidebar -->
</aside>
