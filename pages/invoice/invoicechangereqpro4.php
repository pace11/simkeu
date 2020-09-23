<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=invoice">Invoice</a></li>
        <li class="breadcrumb-item active">Edit Data Invoice Ticket</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Edit Data Invoice Ticket</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){
                                            $id         = $_POST['id'];
                                            $id_inv     = $_POST['id_invoice'];
                                            $count      = $_POST['count'];
                                            $note       = $_POST['note_rc'];
                                            $updated_at = date('Y-m-d H:i:s');
                    
                                            if ($count == 0) {
                                                $q = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$id_inv'");
                                                $get = mysqli_fetch_array($q);

                                                $data = [
                                                    "id" => $get['id'],
                                                    "auth_login_id" => $get['auth_login_id'],
                                                    "customer_id" => $get['customer_id'],
                                                    "product_id" => $get['product_id'],
                                                    "invoice_number" => $get['invoice_number'],
                                                    "invoice_contract_no" => $get['invoice_contract_no'] ? $get['invoice_contract_no'] : '-',
                                                    "invoice_record_no" => $get['invoice_record_no'] ? $get['invoice_record_no'] : '-',
                                                    "invoice_date" => $get['invoice_date'] ? $get['invoice_date'] : '-',
                                                    "invoice_total_hour" => $get['invoice_total_hour'] ? $get['invoice_total_hour'] : '-',
                                                    "invoice_price_hour" => $get['invoice_price_hour'] ? $get['invoice_price_hour'] : '-',
                                                    "invoice_note" => $get['invoice_note'] ? $get['invoice_note'] : '-',
                                                    "invoice_date_period_1" => $get['invoice_date_period_1'] ? $get['invoice_date_period_1'] : '-',
                                                    "invoice_date_period_2" => $get['invoice_date_period_2'] ? $get['invoice_date_period_2'] : '-',
                                                    "invoice_route_from" => $get['invoice_route_from'] ? $get['invoice_route_from'] : '-',
                                                    "invoice_route_to" => $get['invoice_route_to'] ? $get['invoice_route_to'] : '-',
                                                    "invoice_calculated" => $get['invoice_calculated'] ? $get['invoice_calculated'] : '-',
                                                    "invoice_total" => $get['invoice_total'] ? $get['invoice_total'] : '-',
                                                    "invoice_vat" => $get['invoice_vat'] ? $get['invoice_vat'] : '-',
                                                    "invoice_iwjr" => $get['invoice_iwjr'] ? $get['invoice_iwjr'] : '-',
                                                    "invoice_psc" => $get['invoice_psc'] ? $get['invoice_psc'] : '-',
                                                    "invoice_amount" => $get['invoice_amount'] ? $get['invoice_amount'] : '-',
                                                    "invoice_file" => $get['invoice_file'],
                                                    "created_at" => $get['created_at'],
                                                    "updated_at" => $get['updated_at']
                                                ];
                                                $data_json = json_encode($data);

                                                $insert = mysqli_query($conn, "INSERT INTO invoices_log SET
                                                                                invoice_id         = '$id_inv',
                                                                                invoice_log_data   = '$data_json',
                                                                                invoice_log_note   = '$note',
                                                                                invoice_log_status = 'T',
                                                                                invoice_log_filled = 'T',
                                                                                created_at         = '$updated_at',
                                                                                updated_at         = '$updated_at'") or die (mysqli_error($conn));
                                            } else {
                                                $insert = mysqli_query($conn, "UPDATE invoices_log SET
                                                            invoice_log_note   = '$note',
                                                            updated_at         = '$updated_at'
                                                            WHERE id           = '$id'") or die (mysqli_error($conn));
                                            }
                                            
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