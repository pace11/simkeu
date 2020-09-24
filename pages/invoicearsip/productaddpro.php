<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=product">Product</a></li>
        <li class="breadcrumb-item active">Add Data Product</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Add Data Product</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $prod_name  = $_POST['product_name'];
                                            $prod_code  = strtoupper($_POST['product_code']);
                    
                                            $created_at = date('Y-m-d H:i:s');
                                            $updated_at = date('Y-m-d H:i:s');
                    
                                            $insert = mysqli_query($conn, "INSERT INTO products SET
                                                    id                  = '$id',
                                                    product_name        = '$prod_name',
                                                    product_code        = '$prod_code',
                                                    created_at          = '$created_at',
                                                    updated_at          = '$updated_at'") or die (mysqli_error($conn));
                                            
                                            if ($insert){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data has been saved.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=product'>";
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