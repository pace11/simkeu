<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active">User</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Data User</div>
                        <div class="card-body">
                            <?php if (get_user_login('role_login_id') != 5) { ?>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                <a href="?page=useradd" class="btn btn-primary"><span class="fa fa-plus-circle"></span> Add Data User</a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="example table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Last Login</th>
                                                <th>Active User</th>
                                                <?php if (get_user_login('role_login_id') != 5) { ?>
                                                <th width="100px">Status</th>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;

                                        if (get_user_login('id') == 1)
                                            $q = mysqli_query($conn, "SELECT * FROM auth_login WHERE deleted_at IS NULL AND role_login_id <> 1 ORDER BY updated_at DESC");
                                        else 
                                            $q = mysqli_query($conn, "SELECT * FROM auth_login WHERE deleted_at IS NULL AND role_login_id <> 1 AND role_login_id <> 2 ORDER BY updated_at DESC");
                                        
                                        while($data=mysqli_fetch_array($q)){ ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><span class="badge badge-success"><?= $data[0] ?></span></td>
                                                <td><?= !empty($data['name']) ? $data['name'] : '-' ?></td>
                                                <td><?= !empty($data['username']) ? $data['username'] : '-' ?></td>
                                                <td><?= role_desc($data['role_login_id']) ?></td>
                                                <td><?= $data['last_login'] ? date_time($data['last_login']) : '-' ?></td>
                                                <td><?= empty($data['auth_login_active']) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' ?></td>
                                                <?php if (get_user_login('role_login_id') != 5) { ?>
                                                <td>
                                                    <select class="form-control active_user">
                                                        <option style="display:none;">- choose -</option>
                                                        <option value="Y<?= $data[0] ?>">Active</option>
                                                        <option value="T<?= $data[0] ?>">Inactive</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="?page=useredit&id=<?= $data['id'] ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-edit"></i> edit</a>
                                                    <a href="?page=userdelete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash"></i> delete</a>
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
<script type="text/javascript">
$(function () {
    $('.active_user').change(function(){
        var $option = $(this).find('option:selected');
        var value = $option.val();
        $.ajax({
            url: 'config/active_user.php',
            tyle: 'post',
            data: { 'data': value },
            success: function(res) {
                location.reload(true);
            },
            error: function(err) {
                console.log(err)
            }
        });
    });
});
</script>