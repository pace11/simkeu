<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Customer</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Customer</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=customeradd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Tambah Data Customer</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-sm table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>No Telp</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM customers WHERE deleted_at IS NULL ORDER BY updated_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data['id'] ?></span></td>
                                                <td><?= !empty($data['customer_name']) ? $data['customer_name'] : '-' ?></td>
                                                <td><?= !empty($data['customer_phone']) ? $data['customer_phone'] : '-' ?></td>
                                                <td><?= !empty($data['customer_address']) ? $data['customer_address'] : '-' ?></td>
                                                <td>
                                                    <a href="?page=customeredit&id=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=customerdelete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> hapus</a>
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