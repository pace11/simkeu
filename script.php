<script src="./dist/vendors/jquery/jquery.min.js"></script>
<script src="./coreui/coreui/dist/js/coreui.bundle.min.js"></script>
<script src="./coreui/icons/js/svgxuse.min.js"></script>
<script src="./coreui/chartjs/dist/js/coreui-chartjs.bundle.js"></script>
<script src="./coreui/utils/dist/coreui-utils.js"></script>
<script src="./dist/js/main.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
        $('.example').DataTable()
    });
</script>
<script>
$(document).ready(function(){
    $(".kapital").keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
});
</script>