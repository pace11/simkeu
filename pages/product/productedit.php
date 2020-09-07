<?php 
    $g = mysqli_query($conn, "SELECT * FROM products WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=product">Product</a></li>
        <li class="breadcrumb-item active">Edit Data Product</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Product</div>
                        <form action="?page=producteditpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">ID Product</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="badge badge-primary"><?= $data['id'] ?></span>
                                                    <input type="hidden" value="<?= $data['id'] ?>" name="id"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Nama Product</label>
                                            <input class="form-control" type="text" placeholder="Nama Customer ..." name="product_name" autocomplete="OFF" value="<?= $data['product_name'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Kode Product</label>
                                            <input class="form-control kapital" type="text" placeholder="Kode Product ..." name="product_code" autocomplete="OFF" value="<?= $data['product_code'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=product" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>