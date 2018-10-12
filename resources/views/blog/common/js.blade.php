<!-- jQuery 3 -->
<script src="{{ asset('./common/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('./common/bower_components/jquery-ui/ui/widget.js') }}"></script>
<script src="{{ asset('./common/bower_components/jquery-ui/jquery-ui.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('./common/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('./common/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('./common/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('./common/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('./common/common/common.js') }}"></script>
<script>
    /**导航栏*/
    var treeview = $('.treeview');
    $.each(treeview,function(index,item){
        $(item).removeClass('menu-open active');
    });
    var controller = "{{$controller}}".toLowerCase();
    $('.'+controller).addClass('menu-open active');
    //$('.'+controller).
    // $('.treeview').click(function () {
    //
    //     this.addClass('menu-open');
    // })
    // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('./common/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('./common/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('./common/dist/js/adminlte.min.js') }}"></script>
<!-- CK Editor -->
<!-- Sparkline -->
<script src="{{ asset('./common/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('./common/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('./common/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('./common/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('./common/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('./common/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('./common/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('./common/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('./common/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('./common/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('./common/dist/js/pages/dashboard2.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('./common/dist/js/demo.js') }}"></script>
<script>
    $(function () {

        // //Datemask dd/mm/yyyy
        // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        // //Datemask2 mm/dd/yyyy
        // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ autoUpdateInput: false, timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' }).on('cancel.daterangepicker', function(ev, picker) {
            $("#reservationtime").val("请选择日期");
        }).on('apply.daterangepicker', function(ev, picker) {
            $("#reservationtime").val(picker.startDate.format('MM/DD/YYYY H:s') +'-'+ picker.endDate.format('MM/DD/YYYY H:s'));
        })

        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    '今天'       : [moment(), moment()],
                    '昨天'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '七天前' : [moment().subtract(6, 'days'), moment()],
                    '30天前': [moment().subtract(29, 'days'), moment()],
                    '这个月'  : [moment().startOf('month'), moment().endOf('month')],
                    '上个月'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
        $('.ranges li:last').hide();
    })
</script>