<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">Reg</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data Reg</div>
                        <div class="card-body">
                            <?php if (get_user_login('role_login_id') != 5) { ?>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=regadd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Add Data Reg</a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-responsive-sm table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <?php if (get_user_login('role_login_id') != 5) { ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        $q = mysqli_query($conn, "SELECT * FROM reg WHERE deleted_at IS NULL ORDER BY updated_at DESC");
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data['id'] ?></span></td>
                                                <td><?= !empty($data['reg_name']) ? $data['reg_name'] : '-' ?></td>
                                                <td><?= !empty($data['reg_description']) ? $data['reg_description'] : '-' ?></td>
                                                <?php if (get_user_login('role_login_id') != 5) { ?>
                                                <td>
                                                    <a href="?page=regedit&id=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=regdelete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
                                                </td>
                                                <?php } ?>
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