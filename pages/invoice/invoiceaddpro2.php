<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=invoice">Invoice</a></li>
        <li class="breadcrumb-item active">Add Data Invoice</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Add Data Invoice</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if (isset($_POST['submit'])){

                                            $product = $_POST['product'];

                                            $month_now = date('m');
                                            $year_now = date('Y');

                                            $get = mysqli_query($conn, "SELECT invoice_number, product_code, product_id FROM invoices
                                                                        JOIN products ON invoices.product_id=products.id
                                                                        WHERE SUBSTRING(invoice_date,6,2)='$month_now' AND product_id='$product'
                                                                        ORDER BY invoice_number DESC LIMIT 1") or die (mysqli_error($conn));
                                            $get_product = mysqli_query($conn, "SELECT product_code FROM products WHERE id='$product'") or die (mysqli_error($conn));
                                            $data = mysqli_fetch_array($get);
                                            $data_product = mysqli_fetch_array($get_product);
                                            $count = mysqli_num_rows($get);
                                            $number = $count > 0 ? $data['invoice_number']+1 : $count+1;

                                            if ($count == 0) {
                                                $invoice_number = '01';
                                                $id_invoice = $data_product['product_code'].'/'.'01/'.get_romawi($month_now).'/'.$year_now;
                                            } else {
                                                if ($number <= 9) {
                                                    $invoice_number = '0'.$number;
                                                    $id_invoice = $data_product['product_code'].'/0'.$number.'/'.get_romawi($month_now).'/'.$year_now;
                                                } else {
                                                    $invoice_number = $number;
                                                    $id_invoice = $data['product_code'].'/'.$number.'/'.get_romawi($month_now).'/'.$year_now;
                                                }
                                            }

                                            $user           = $_POST['id_user'];
                                            $customer       = $_POST['customer'];
                                            $contract       = $_POST['contract_no'];
                                            $record         = $_POST['record_no'];
                                            $invoice_date   = date('Y-m-d', strtotime($_POST['invoice_date']));
                                            $total_hour     = $_POST['total_hour'];
                                            $reg            = $_POST['reg'];
                                            $asal           = strtolower($_POST['asal']);
                                            $tujuan         = strtolower($_POST['tujuan']);

                                            $filename = str_replace(['-','/'], ['',''],$id_invoice).'.pdf';
                                            $dir = strtoupper(date('F_Y', strtotime($_POST['invoice_date'])));
                                            $exist_dir = "file/".$dir;

                                            $invoice_file   = $exist_dir.'/'.$filename;
                                            $total          = intval($_POST['total_amount']);
                                            $ppn            = intval($_POST['total_amount']*0.1);
                                            $amount         = ($total+$ppn);
                                            $terbilang      = terbilang($amount).' rupiah';

                                            $created_at = date('Y-m-d H:i:s');
                                            $updated_at = date('Y-m-d H:i:s');
                    
                                            $insert = mysqli_query($conn, "INSERT INTO invoices SET
                                                        id                      = '$id_invoice',
                                                        auth_login_id           = '$user',
                                                        customer_id             = '$customer',
                                                        product_id              = '$product',
                                                        reg_id                  = '$reg',
                                                        invoice_number          = '$invoice_number',
                                                        invoice_contract_no     = NULLIF('$contract', ''),
                                                        invoice_record_no       = NULLIF('$record', ''),
                                                        invoice_date            = NULLIF('$invoice_date', ''),
                                                        invoice_total_hour      = NULLIF('$total_hour', ''),
                                                        invoice_route_from      = NULLIF('$asal', ''),
                                                        invoice_route_to        = NULLIF('$tujuan', ''),
                                                        invoice_calculated      = NULLIF('$terbilang', ''),
                                                        invoice_total           = NULLIF('$total', ''), 
                                                        invoice_ppn             = NULLIF('$ppn', ''),
                                                        invoice_amount          = NULLIF('$amount', ''), 
                                                        invoice_file            = '$invoice_file',
                                                        created_at              = '$created_at',
                                                        updated_at              = '$updated_at'") or die (mysqli_error($conn));
                                            
                                            if ($insert){
                                                echo    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data has beed saved.'.
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