<?php 
    $get_id = mysqli_query($conn, "SELECT id FROM customers WHERE SUBSTRING(id,1,8)='CUSTOMER'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id,-5,5) as hasil FROM customers WHERE SUBSTRING(id,1,8)='CUSTOMER' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "CUSTOMER00001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "CUSTOMER".str_pad($kode,5,"0",STR_PAD_LEFT); 
    }    
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=customer">Customer</a></li>
        <li class="breadcrumb-item active">Tambah Data Customer</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Customer</div>
                        <form action="?page=customeraddpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">ID Customer</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="badge badge-primary"><?= $id_k ?></span>
                                                    <input type="hidden" value="<?= $id_k ?>" name="id"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Nama Customer</label>
                                            <input class="form-control" type="text" placeholder="Nama Customer ..." name="customer_name" autocomplete="OFF" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Telepon Customer</label>
                                            <input class="form-control" type="text" placeholder="Telepon Customer ..." name="customer_phone" autocomplete="OFF">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Alamat Customer</label>
                                            <textarea class="form-control" name="customer_address" rows="3" placeholder="Alamat Customer ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a href="?page=customer" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>