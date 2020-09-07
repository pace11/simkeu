<?php 
    $get_id = mysqli_query($conn, "SELECT id FROM reg WHERE SUBSTRING(id,1,3)='REG'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id,-7,7) as hasil FROM reg WHERE SUBSTRING(id,1,3)='REG' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "REG0000001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "REG".str_pad($kode,7,"0",STR_PAD_LEFT); 
    }    
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=reg">Reg</a></li>
        <li class="breadcrumb-item active">Tambah Data Reg</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Reg</div>
                        <form action="?page=regaddpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">ID Reg</label>
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
                                            <label for="name">Nama Reg</label>
                                            <input class="form-control kapital" type="text" placeholder="Nama Reg ..." name="reg_name" autocomplete="OFF" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Deskripsi Reg</label>
                                            <textarea class="form-control" name="reg_desc" rows="3" placeholder="Deskripsi Reg ..."></textarea>
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