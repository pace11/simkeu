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
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">Process print invoice
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <?php 
                                        $id         = $_GET['id'];
                                        $date       = $_GET['date'];
                                        $product    = $_GET['pid'];
                                        $filename   = str_replace(['-','/'], ['',''],$id).'.pdf';
                                        $dir        = strtoupper(date('F_Y', strtotime($date)));
                                        $exist_dir  = "file/".$dir;
                                        if (!file_exists($exist_dir)) {
                                            mkdir("file/".$dir, 0777);
                                        }

                                        if ($product == 'PRODUCT001') 
                                            $html = file_get_contents(url_file()."/crg.php?id=$id");
                                        else if ($product == 'PRODUCT002')
                                            $html = file_get_contents(url_file()."/charter.php?id=$id");
                                        else if ($product == 'PRODUCT003')
                                            $html = file_get_contents(url_file()."/gh.php?id=$id");
                                        else
                                            $html = file_get_contents(url_file()."/ticket.php?id=$id");

                                        $dompdf->loadHtml($html);
                                        $dompdf->setPaper('A4', 'portrait');
                                        $dompdf->render();
                                        $output = $dompdf->output();
                                        $file_put = file_put_contents($exist_dir.'/'.$filename, $output);  
                                        
                                        if ($file_put){
                                            echo "<meta http-equiv='refresh' content='1;
                                            url=$exist_dir/$filename'>";
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