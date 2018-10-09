@include('manager.common.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('manager.common.left')
    @include('manager.common.top')
    @section('content')
        @include('manager.common.content')
    @show
    @include('manager.common.footer')
    <div class="control-sidebar-bg"></div>
</div>
@include('manager.common.js')
</body>
</html>
