<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=invoice">Invoice</a></li>
        <li class="breadcrumb-item active">Edit Data Invoice Ground Handling</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Invoice Ground Handling</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $note       = $_POST['note_rc'];
                                            $time       = date('Y-m-d H:i:s');
                    
                                            $q      = mysqli_query($conn, "SELECT * FROM invoices JOIN customers ON invoices.customer_id=customers.id WHERE invoices.id='$id'");
                                            $get    = mysqli_fetch_array($q);

                                            $data = [
                                                0 => $get[0],
                                                "id" => $get[0],
                                                "auth_login_id" => $get['auth_login_id'],
                                                "customer_id" => $get['customer_id'],
                                                "customer_name" => $get['customer_name'],
                                                "customer_address" => $get['customer_address'],
                                                "customer_phone" => $get['customer_phone'],
                                                "product_id" => $get['product_id'],
                                                "invoice_number" => $get['invoice_number'] ? $get['invoice_number'] : '-',
                                                "invoice_number_rev" => '01',
                                                "invoice_contract_no" => $get['invoice_contract_no'] ? $get['invoice_contract_no'] : '-',
                                                "invoice_record_no" => $get['invoice_record_no'] ? $get['invoice_record_no'] : '-',
                                                "invoice_date" => $get['invoice_date'] ? $get['invoice_date'] : '-',
                                                "invoice_total_hour" => $get['invoice_total_hour'] ? $get['invoice_total_hour'] : '-',
                                                "invoice_price_hour" => $get['invoice_price_hour'] ? $get['invoice_price_hour'] : '-',
                                                "invoice_note" => $get['invoice_note'] ? $get['invoice_note'] : '-',
                                                "invoice_date_period_1" => $get['invoice_date_period_1'] ? $get['invoice_date_period_1'] : '-',
                                                "invoice_date_period_2" => $get['invoice_date_period_2'] ? $get['invoice_date_period_2'] : '-',
                                                "invoice_calculated" => $get['invoice_calculated'] ? $get['invoice_calculated'] : '-',
                                                "invoice_total" => $get['invoice_total'] ? $get['invoice_total'] : '-',
                                                "invoice_vat" => $get['invoice_vat'] ? $get['invoice_vat'] : '-',
                                                "invoice_amount" => $get['invoice_amount'] ? $get['invoice_amount'] : '-',
                                                "invoice_file" => $get['invoice_file'],
                                                "created_at" => $get[34],
                                                "updated_at" => $get[35]
                                            ];
                                            $data_json = json_encode($data);

                                            $insert = mysqli_query($conn, "UPDATE invoices SET
                                                                            invoice_number_rev = '01',
                                                                            invoice_log_data   = '$data_json',
                                                                            invoice_log_note   = '$note',
                                                                            created_at         = '$time',
                                                                            updated_at         = '$time'
                                                                            WHERE   id         = '$id'") or die (mysqli_error($conn));
                                                
                                            if ($insert){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Request change sent.'.
                                                            '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.
                                                        '</div>';
                                                echo "<meta http-equiv='refresh' content='2;
                                                url=?page=invoice'>";
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