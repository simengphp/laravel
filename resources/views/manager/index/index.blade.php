@include('manager.common.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('manager.common.top')
    @include('manager.common.left')
    @section('content')
        @include('manager.common.content')
    @show
    @include('manager.common.footer')
    <div class="control-sidebar-bg"></div>
</div>
@include('manager.common.js')
</body>
</html>
