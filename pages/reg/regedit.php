<?php 
    $g = mysqli_query($conn, "SELECT * FROM reg WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($g);
?>

<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=product">Reg</a></li>
        <li class="breadcrumb-item active">Edit Data Reg</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Reg</div>
                        <form action="?page=regeditpro" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">ID Reg</label>
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
                                            <label for="name">Name Reg</label>
                                            <input class="form-control" type="text" placeholder="Name Reg ..." name="reg_name" autocomplete="OFF" value="<?= $data['reg_name'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Description Reg</label>
                                            <textarea class="form-control" name="reg_desc" rows="3" placeholder="Description Reg ..."><?= $data['reg_description'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                <a href="?page=reg" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>