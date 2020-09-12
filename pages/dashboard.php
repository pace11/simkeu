<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-gradient-info">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-3xl">
                                    <use xlink:href="./coreui/icons/sprites/free.svg#cil-fork"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg"><?= count_table('customers') ?></div>
                            <small class="text-muted text-uppercase font-weight-bold">Customers</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-gradient-danger">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-3xl">
                                    <use xlink:href="./coreui/icons/sprites/free.svg#cil-scrubber"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg"><?= count_table('products') ?></div>
                            <small class="text-muted text-uppercase font-weight-bold">Produk</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-gradient-success">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-3xl">
                                    <use xlink:href="./coreui/icons/sprites/free.svg#cil-applications"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg"><?= count_table('reg') ?></div>
                            <small class="text-muted text-uppercase font-weight-bold">Reg</small>
                        </div>
                    </div>
                </div>
                <?php if (get_user_login('role_login_id') == 1) { ?>
                <div class="col-md-3">
                    <div class="card text-white bg-gradient-primary">
                        <div class="card-body">
                            <div class="text-muted text-right mb-4">
                                <svg class="c-icon c-icon-3xl">
                                    <use xlink:href="./coreui/icons/sprites/free.svg#cil-people"></use>
                                </svg>
                            </div>
                            <div class="text-value-lg"><?= (count_table('auth_login')-1) ?></div>
                            <small class="text-muted text-uppercase font-weight-bold">User</small>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Invoice Grafik
                            <div class="card-header-actions">
                                <select class="form-control" id="by_month">
                                    <?php 
                                        $sql = mysqli_query($conn, "SELECT MONTH(invoice_date) as bulan, YEAR(invoice_date) as tahun FROM invoices GROUP BY bulan DESC, tahun");
                                        echo '<option style="display:none;">-- pilih salah satu --</option>';
                                        while($datas = mysqli_fetch_array($sql)) { ?>
                                            <option value="<?= $datas['bulan'].'_'.$datas['tahun'] ?>"><?= month_year($datas['bulan'],$datas['tahun']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="table_grafik"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="c-chart-wrapper">
                                        <canvas id="canvas-2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        var nowData, data_table
        $('#table_grafik').hide();
        var barChart = new Chart(document.getElementById('canvas-2'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Cargo',
                        backgroundColor: '#2eb85c',
                        data: []
                    }, 
                    {
                        label: 'Charter',
                        backgroundColor: '#e55353',
                        data: []
                    },
                    {
                        label: 'Ground Handling',
                        backgroundColor: '#321fdb',
                        data: []
                    },
                    {
                        label: 'Ticket',
                        backgroundColor: '#f9b115',
                        data: []
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
        $('#by_month').change(function(){
            var $option = $(this).find('option:selected');
            var value = $option.val();
            var data;
            $.ajax({
                url: 'config/data_post.php',
                tyle: 'post',
                data: { 'id': value },
                success: function(res) {
                    data = jQuery.parseJSON(res);
                    console.log(data);
                    table = '<table class="table table-responsive-sm table-bordered table-sm"><thead><tr><th>Product</th><th>Total</th></tr></thead><tbody>';
                    table += '<tr><td><span class="badge badge-success">Cargo</span></td><td>'+data[0].value_table[0]+'</td></tr>';
                    table += '<tr><td><span class="badge badge-danger">Charter</span></td><td>'+data[0].value_table[1]+'</td></tr>';
                    table += '<tr><td><span class="badge badge-primary">Ground Handling</span></td><td>'+data[0].value_table[2]+'</td></tr>';
                    table += '<tr><td><span class="badge badge-warning">Ticket</span></td><td>'+data[0].value_table[3]+'</td></tr></tbody></table>';
                    barChart.data.labels = [data[0].label];
                    barChart.data.datasets[0].data = [data[0].value[0]];
                    barChart.data.datasets[1].data = [data[0].value[1]];
                    barChart.data.datasets[2].data = [data[0].value[2]];
                    barChart.data.datasets[3].data = [data[0].value[3]];
                    barChart.update();
                    $('#table_grafik').append(table);
                    $('#table_grafik').show(500);
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
    });
</script>