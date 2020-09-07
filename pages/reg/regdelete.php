<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=reg">Reg</a></li>
        <li class="breadcrumb-item active">Hapus Data Reg</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Hapus Data Reg</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        Apakah anda yakin ingin menghapus data ini ?
                                        <form action="?page=regdelete" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                            <input type="submit" name="submit" class="btn btn-danger" value="Ya">
                                            <a href="?page=reg" class="btn btn-primary">Tidak</a>
                                        </form>
                                    </div>
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $deleted_at = date('Y-m-d H:i:s');
                                            $delete     = mysqli_query($conn, "UPDATE reg SET deleted_at='$deleted_at' WHERE id='$id'");
                                            if ($delete){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Data telah dihapus.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=reg'>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>