<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=customer">Customer</a></li>
        <li class="breadcrumb-item active">Delete Data Customer</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Delete Data Customer</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        Are you realy to delete this data ?
                                        <form action="?page=customerdelete" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                            <input type="submit" name="submit" class="btn btn-danger" value="Yes">
                                            <a href="?page=customer" class="btn btn-primary">No</a>
                                        </form>
                                    </div>
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $deleted_at = date('Y-m-d H:i:s');
                                            $delete     = mysqli_query($conn, "UPDATE customers SET deleted_at='$deleted_at' WHERE id='$id'");
                                            if ($delete){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data has been deleted.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=customer'>";
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