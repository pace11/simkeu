<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=user">User</a></li>
        <li class="breadcrumb-item active">Edit Data User</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data User</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $role       = $_POST['role'];
                                            $name       = $_POST['name'];
                                            $username   = $_POST['username'];
                                            $password   = encrypt_decrypt('encrypt', $_POST['password']);

                                            $updated_at = date('Y-m-d H:i:s');
                    
                                            $insert = mysqli_query($conn, "UPDATE auth_login SET
                                                    role_login_id   =  $role,
                                                    name            = '$name',
                                                    username        = '$username',
                                                    password        = '$password',
                                                    updated_at      = '$updated_at'
                                                    WHERE id        = '$id'") or die (mysqli_error($conn));
                                            
                                            if ($insert){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data has been saved.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=user'>";
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