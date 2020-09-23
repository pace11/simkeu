<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Invoice Print Log</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Invoice Print Log</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>User</th>
                                                <th>Date Print Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices_print_log
                                                                JOIN auth_login ON invoices_print_log.auth_login_id=auth_login.id
                                                                JOIN invoices ON invoices_print_log.invoice_id=invoices.id
                                                                JOIN products ON invoices.product_id=products.id
                                                                ORDER BY invoices_print_log.updated_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data['invoice_number_rev'] ? 'REV'.$data['invoice_number_rev'].'-'.$data['invoice_id'] : $data['invoice_id'] ?></span></td>
                                                <td><?= $data['product_name'].' - ['.$data['product_code'].']' ?></td>
                                                <td><span class="badge badge-info"><i class="fa fa-user"></i> <?= $data['username'] ?></span></td>
                                                <td><?= date_time($data[4]) ?></td>
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