<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Invoice Arsip</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Invoice Arsip</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>History</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM invoices
                                                                JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                                                ORDER BY invoices.updated_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data['invoice_number_rev'] ? 'REV'.$data['invoice_number_rev'].'-'.$data[0] : $data[0] ?></span></td>
                                                <td><span class="badge badge-info"><i class="fa fa-user"></i> <?= $data['username'] ?></span></td>
                                                <td><?= history_arsip_invoice($data[0]) ?></td>
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