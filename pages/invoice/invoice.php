<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Invoice</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Invoice</div>
                        <div class="card-body">
                            <?php if (get_user_login('id') == 3 || get_user_login('id') == 4 && get_user_login('role_login_id') != 5) { ?>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <a href="?page=invoiceadd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Invoice</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <button id="btn1" class="btn btn-info btn-sm">CARGO</button>
                                    <button id="btn2" class="btn btn-info btn-sm">CHARTER</button>
                                    <button id="btn3" class="btn btn-info btn-sm">GROUND HANDLING</button>
                                    <button id="btn4" class="btn btn-info btn-sm">TICKET</button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="produk1" class="col-md-12">
                                    <table class="example table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>User in request</th>
                                                <th width="400px">Information Change</th>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                <th width="150px">Status</th>
                                                <?php } ?>
                                                <th width="50px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT001'
                                                                ORDER BY invoices.updated_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <span class="badge badge-success"><?= $data['invoice_number_rev'] ? 'REV.'.$data[0] : $data[0] ?></span>
                                                    <?= history_log_print($data[0]) ?>
                                                </td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><span class="badge badge-info"><i class="fa fa-user"></i> <?= $data['username'] ?></span></td>
                                                <td><?= desc_invoices_log($data[0]) ?></td>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                    <td>
                                                    <?= approved_select($data[0]) ?>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <?php if ($data['auth_login_id'] == get_user_login(0) && get_user_login('role_login_id') != 5 && $data['invoice_log_filled'] == 'T') { ?>
                                                        <a href="?page=invoiceedit1&id=<?= $data[0] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-edit"></i> edit</a>
                                                    <?php } ?>
                                                    <a href="?page=invoiceprint&id=<?= $data[0] ?>&date=<?= $data['invoice_date'] ?>&pid=<?= $data['product_id'] ?>&type=T" class="btn btn-success btn-sm mb-1"><i class="fa fa-print"></i> print</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="produk2" class="col-md-12">
                                    <table class="example table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>User in request</th>
                                                <th width="400px">Information Change</th>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                <th width="150px">Status</th>
                                                <?php } ?>
                                                <th width="50px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT002'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <span class="badge badge-success"><?= $data['invoice_number_rev'] ? 'REV.'.$data[0] : $data[0] ?></span>
                                                    <?= history_log_print($data[0]) ?>
                                                </td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><span class="badge badge-info"><i class="fa fa-user"></i> <?= $data['username'] ?></span></td>
                                                <td><?= desc_invoices_log($data[0]) ?></td>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                    <td>
                                                    <?= approved_select($data[0]) ?>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <?php if ($data['auth_login_id'] == get_user_login(0) && get_user_login('role_login_id') != 5 && $data['invoice_log_filled'] == 'T') { ?>
                                                        <a href="?page=invoiceedit2&id=<?= $data[0] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-edit"></i> edit</a>
                                                    <?php } ?>
                                                    <a href="?page=invoiceprint&id=<?= $data[0] ?>&date=<?= $data['invoice_date'] ?>&pid=<?= $data['product_id'] ?>&type=T" class="btn btn-success btn-sm mb-1"><i class="fa fa-print"></i> print</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="produk3" class="col-md-12">
                                    <table class="example table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>User in request</th>
                                                <th width="400px">Information Change</th>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                <th width="150px">Status</th>
                                                <?php } ?>
                                                <th width="50px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT003'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <span class="badge badge-success"><?= $data['invoice_number_rev'] ? 'REV.'.$data[0] : $data[0] ?></span>
                                                    <?= history_log_print($data[0]) ?>
                                                </td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><span class="badge badge-info"><i class="fa fa-user"></i> <?= $data['username'] ?></span></td>
                                                <td><?= desc_invoices_log($data[0]) ?></td>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                    <td>
                                                    <?= approved_select($data[0]) ?>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <?php if ($data['auth_login_id'] == get_user_login(0) && get_user_login('role_login_id') != 5 && $data['invoice_log_filled'] == 'T') { ?>
                                                        <a href="?page=invoiceedit3&id=<?= $data[0] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-edit"></i> edit</a>
                                                    <?php } ?>
                                                    <a href="?page=invoiceprint&id=<?= $data[0] ?>&date=<?= $data['invoice_date'] ?>&pid=<?= $data['product_id'] ?>&type=T" class="btn btn-success btn-sm mb-1"><i class="fa fa-print"></i> print</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="produk4" class="col-md-12">
                                    <table class="example table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>User in request</th>
                                                <th width="400px">Information Change</th>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                <th width="150px">Status</th>
                                                <?php } ?>
                                                <th width="50px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT004'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <span class="badge badge-success"><?= $data['invoice_number_rev'] ? 'REV.'.$data[0] : $data[0] ?></span>
                                                    <?= history_log_print($data[0]) ?>
                                                </td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><span class="badge badge-info"><i class="fa fa-user"></i> <?= $data['username'] ?></span></td>
                                                <td><?= desc_invoices_log($data[0]) ?></td>
                                                <?php if (get_user_login('role_login_id') == 2 && get_user_login('role_login_id') != 5) { ?>
                                                    <td>
                                                    <?= approved_select($data[0]) ?>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <?php if ($data['auth_login_id'] == get_user_login(0) && get_user_login('role_login_id') != 5 && $data['invoice_log_filled'] == 'T') { ?>
                                                        <a href="?page=invoiceedit4&id=<?= $data[0] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-edit"></i> edit</a>
                                                    <?php } ?>
                                                    <a href="?page=invoiceprint&id=<?= $data[0] ?>&date=<?= $data['invoice_date'] ?>&pid=<?= $data['product_id'] ?>&type=T" class="btn btn-success btn-sm mb-1"><i class="fa fa-print"></i> print</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
$(document).ready(function(){
    $('#btn1').addClass('disabled');
    $('#produk2,#produk3,#produk4').hide();

    $("#btn1").click(function(){
        $('#btn2,#btn3,#btn4').removeClass('disabled');
        $('#btn1').addClass('disabled');
        $('#produk1').fadeIn();
        $('#produk2,#produk3,#produk4').hide();
    });

    $("#btn2").click(function(){
        $('#btn1,#btn3,#btn4').removeClass('disabled');
        $('#btn2').addClass('disabled');
        $('#produk2').fadeIn();
        $('#produk1,#produk3,#produk4').hide();
    });

    $("#btn3").click(function(){
        $('#btn1,#btn2,#btn4').removeClass('disabled');
        $('#btn3').addClass('disabled');
        $('#produk3').fadeIn();
        $('#produk1,#produk2,#produk4').hide();
    });

    $("#btn4").click(function(){
        $('#btn1,#btn2,#btn3').removeClass('disabled');
        $('#btn4').addClass('disabled');
        $('#produk4').fadeIn();
        $('#produk1,#produk2,#produk3').hide();
    });
});
</script>
<script type="text/javascript">
    $(function () {
        $('.approved').change(function(){
            var $option = $(this).find('option:selected');
            var value = $option.val();
            var data = $('')
            $.ajax({
                url: 'config/approved_invoice.php',
                tyle: 'post',
                data: { 'data': value },
                success: function(res) {
                    location.reload(true);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        });
    });
</script>