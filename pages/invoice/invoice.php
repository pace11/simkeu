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
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=invoiceadd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Invoice</a>
                                </div>
                            </div>
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
                                    <table class="example table table-responsive table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Contract No</th>
                                                <th>Record No</th>
                                                <th>Customer</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Total Hour</th>
                                                <th>Price Hour</th>
                                                <th>Extended Price</th>
                                                <th>Total</th>
                                                <th>Vat 1%</th>
                                                <th>Diskon</th>
                                                <th>Total Invoice Amount</th>
                                                <th>Terbilang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT001'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data[0] ?></span></td>
                                                <td><?= !empty($data['invoice_contract_no']) ? $data['invoice_contract_no'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_record_no']) ? $data['invoice_record_no'] : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= description($data[0], $data['product_id']) ?></td>
                                                <td><?= !empty($data['invoice_total_hour']) ? $data['invoice_total_hour'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_price_hour']) ? $data['invoice_price_hour'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_vat']) ? rupiah($data['invoice_vat']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_discount']) ? rupiah($data['invoice_discount']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_amount']) ? rupiah($data['invoice_amount']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_calculated']) ? strtoupper($data['invoice_calculated']) : '-' ?></td>
                                                <td>
                                                    <a href="?page=invoiceedit1&id=<?= $data[0] ?>" class="btn btn-info btn-sm btn-block"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="<?= $data['invoice_file'] ?>" target="_blank" class="btn btn-success btn-sm btn-block"><i class="fa fa-sticky-note"></i> lihat invoice</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="produk2" class="col-md-12">
                                    <table class="example table table-responsive table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Contract No</th>
                                                <th>Record No</th>
                                                <th>Customer</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>PPN 10%</th>
                                                <th>Total Invoice Amount</th>
                                                <th>Terbilang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT002'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data[0] ?></span></td>
                                                <td><?= !empty($data['invoice_contract_no']) ? $data['invoice_contract_no'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_record_no']) ? $data['invoice_record_no'] : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= description($data[0], $data['product_id']) ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_ppn']) ? rupiah($data['invoice_ppn']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_amount']) ? rupiah($data['invoice_amount']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_calculated']) ? strtoupper($data['invoice_calculated']) : '-' ?></td>
                                                <td>
                                                    <a href="?page=invoiceedit2&id=<?= $data[0] ?>" class="btn btn-info btn-sm btn-block"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="<?= $data['invoice_file'] ?>" target="_blank" class="btn btn-success btn-sm btn-block"><i class="fa fa-sticky-note"></i> lihat invoice</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="produk3" class="col-md-12">
                                    <table class="example table table-responsive table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Contract No</th>
                                                <th>Record No</th>
                                                <th>Customer</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>VAT 10%</th>
                                                <th>Total Invoice Amount</th>
                                                <th>Terbilang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT003'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data[0] ?></span></td>
                                                <td><?= !empty($data['invoice_contract_no']) ? $data['invoice_contract_no'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_record_no']) ? $data['invoice_record_no'] : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= description($data[0], $data['product_id']) ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_vat']) ? rupiah($data['invoice_vat']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_amount']) ? rupiah($data['invoice_amount']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_calculated']) ? strtoupper($data['invoice_calculated']) : '-' ?></td>
                                                <td>
                                                    <a href="?page=invoiceedit3&id=<?= $data[0] ?>" class="btn btn-info btn-sm btn-block"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="<?= $data['invoice_file'] ?>" target="_blank" class="btn btn-success btn-sm btn-block"><i class="fa fa-sticky-note"></i> lihat invoice</a>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="produk4" class="col-md-12">
                                    <table class="example table table-responsive table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Contract No</th>
                                                <th>Record No</th>
                                                <th>Customer</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>VAT 10%</th>
                                                <th>PSC</th>
                                                <th>IWJR</th>
                                                <th>Total Invoice Amount</th>
                                                <th>Terbilang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices 
                                                                JOIN customers ON invoices.customer_id=customers.id
                                                                WHERE invoices.deleted_at IS NULL AND invoices.product_id='PRODUCT004'");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data[0] ?></span></td>
                                                <td><?= !empty($data['invoice_contract_no']) ? $data['invoice_contract_no'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_record_no']) ? $data['invoice_record_no'] : '-' ?></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><?= !empty($data['invoice_date']) ? date_ind($data['invoice_date']) : '-' ?></td>
                                                <td><?= description($data[0], $data['product_id']) ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_total']) ? rupiah($data['invoice_total']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_vat']) ? rupiah($data['invoice_vat']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_psc']) ? rupiah($data['invoice_psc']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_iwjr']) ? rupiah($data['invoice_iwjr']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_amount']) ? rupiah($data['invoice_amount']) : '-' ?></td>
                                                <td><?= !empty($data['invoice_calculated']) ? strtoupper($data['invoice_calculated']) : '-' ?></td>
                                                <td>
                                                    <a href="?page=invoiceedit4&id=<?= $data[0] ?>" class="btn btn-info btn-sm btn-block"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="<?= $data['invoice_file'] ?>" target="_blank" class="btn btn-success btn-sm btn-block"><i class="fa fa-sticky-note"></i> lihat invoice</a>
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
<script>
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