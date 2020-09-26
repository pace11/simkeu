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
                                            $id             = $_POST['id'];
                                            $customer       = $_POST['customer'];
                                            $contract       = $_POST['contract_no'];
                                            $record         = $_POST['record_no'];
                                            $invoice_date   = date('Y-m-d', strtotime($_POST['invoice_date']));
                                            $total_hour     = $_POST['total_hour'];
                                            $price_hour     = $_POST['price_hour'];
                                            $note           = $_POST['note'];
                                            $date1          = date('Y-m-d', strtotime($_POST['date1']));
                                            $date2          = date('Y-m-d', strtotime($_POST['date2']));
                                            $asal           = strtolower($_POST['asal']);
                                            $tujuan         = strtolower($_POST['tujuan']);

                                            $filename = str_replace(['-','/'], ['',''],$id).'.pdf';
                                            $dir = strtoupper(date('F_Y', strtotime($_POST['invoice_date'])));
                                            $exist_dir = "file/".$dir;

                                            $invoice_file   = $exist_dir.'/'.$filename;
                                            $total          = intval($_POST['total_amount']);
                                            $vat            = intval($_POST['total_amount']*0.1);
                                            $psc            = $_POST['psc'] ? intval($_POST['psc']) : 0;
                                            $iwjr           = $_POST['iwjr'] ? intval($_POST['iwjr']) : 0;
                                            $amount         = ($total+$vat+$psc+$iwjr);
                                            $terbilang      = terbilang($amount).' rupiah';

                                            $updated_at = date('Y-m-d H:i:s');
                    
                                            $insert = mysqli_query($conn, "UPDATE invoices SET
                                                        customer_id             = '$customer',
                                                        invoice_log_filled      = 'Y',
                                                        invoice_contract_no     = NULLIF('$contract', ''),
                                                        invoice_record_no       = NULLIF('$record', ''),
                                                        invoice_date            = NULLIF('$invoice_date', ''),
                                                        invoice_total_hour      = NULLIF('$total_hour', ''),
                                                        invoice_price_hour      = NULLIF('$price_hour', ''),
                                                        invoice_note            = NULLIF('$note', ''),
                                                        invoice_date_period_1   = NULLIF('$date1', ''),
                                                        invoice_date_period_2   = NULLIF('$date2', ''),
                                                        invoice_route_from      = NULLIF('$asal', ''),
                                                        invoice_route_to        = NULLIF('$tujuan', ''),
                                                        invoice_calculated      = NULLIF('$terbilang', ''),
                                                        invoice_total           = NULLIF('$total', ''), 
                                                        invoice_vat             = NULLIF('$vat', ''),
                                                        invoice_iwjr            = NULLIF('$iwjr', ''),
                                                        invoice_psc             = NULLIF('$psc', ''),
                                                        invoice_amount          = NULLIF('$amount', ''),
                                                        invoice_file            = '$invoice_file',
                                                        updated_at              = '$updated_at'
                                                        WHERE   id              = '$id'") or die (mysqli_error($conn));
                                            
                                            if ($insert){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data has been saved.'.
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