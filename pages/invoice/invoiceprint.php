<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=invoice">Invoice</a></li>
        <li class="breadcrumb-item active">Print Data Invoice</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Print Data Invoice</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        $id         = $_GET['id'];
                                        $type       = $_GET['type'];
                                        $user       = get_user_login(0);
                                        $time       = date('Y-m-d H:i:s');

                                        mysqli_query($conn, "INSERT INTO invoices_print_log SET
                                                            invoice_id      = '$id',
                                                            auth_login_id   = '$user',
                                                            created_at      = '$time',
                                                            updated_at      = '$time'") or die (mysqli_error($conn));

                                        $q = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$id'");
                                        $data = mysqli_fetch_array($q);
                                        if ($type == 'T') {
                                            $path = $data['invoice_file'];
                                        } else {
                                            $get = json_decode($data['invoice_log_data'], true);
                                            $path = $get['invoice_file'];
                                        }
                                    ?>
                                <embed src="<?= $path ?>" width="100%" height="1000px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>