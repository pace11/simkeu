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
                                        $date       = $_GET['date'];
                                        $product    = $_GET['pid'];
                                        $type       = $_GET['type'];
                                        $user       = get_user_login(0);
                                        $filename   = str_replace(['-','/'], ['',''],$id).'.pdf';
                                        $dir        = strtoupper(date('F_Y', strtotime($date)));
                                        $updated_at = date('Y-m-d H:i:s');
                                        $exist_dir  = "file/".$dir;
                                        if (!file_exists($exist_dir)) {
                                            mkdir("file/".$dir, 0777);
                                        } else {
                                            $filedir = "file/".$dir.'/'.$filename;
                                            if (file_exists($filedir)) {
                                                unlink($filedir);
                                            }
                                        }

                                        mysqli_query($conn, "INSERT INTO invoices_print_log SET
                                                            invoice_id      = '$id',
                                                            auth_login_id   = '$user',
                                                            created_at      = '$updated_at',
                                                            updated_at      = '$updated_at'") or die (mysqli_error($conn));

                                        if ($product == 'PRODUCT001') 
                                            $html = file_get_contents(url_file()."/crg.php?id=$id&type=$type");
                                        else if ($product == 'PRODUCT002')
                                            $html = file_get_contents(url_file()."/charter.php?id=$id&type=$type");
                                        else if ($product == 'PRODUCT003')
                                            $html = file_get_contents(url_file()."/gh.php?id=$id&type=$type");
                                        else
                                            $html = file_get_contents(url_file()."/ticket.php?id=$id&type=$type");

                                        $dompdf->loadHtml($html);
                                        $dompdf->setPaper('A4', 'portrait');
                                        $dompdf->render();
                                        $output = $dompdf->output();
                                        $file_put = file_put_contents($exist_dir.'/'.$filename, $output);  
                                    ?>
                                    <?php
                                    if ($file_put) {
                                    ?>
                                    <embed src="<?= $exist_dir.'/'.$filename ?>" width="100%" height="1000px" />
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>