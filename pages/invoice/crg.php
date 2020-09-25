<?php 
    include '../../config/connection.php';
    include '../../config/service.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cargo Invoice</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
        body {
            font-size: 9pt;
        }
        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php 
        if ($_GET['type'] == 'T') { 
            $get = mysqli_query($conn, "SELECT * FROM invoices 
                                        JOIN customers ON invoices.customer_id=customers.id
                                        JOIN products ON invoices.product_id=products.id
                                        JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                        WHERE invoices.id='$_GET[id]'") or die (mysqli_error($conn));
            $data = mysqli_fetch_array($get);
        } else {
            $get    = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM invoices_log WHERE id=$_GET[idl]"));
            $data   = json_decode($get['invoice_log_data'], true);
        }
    ?>
    <div style="width:100%;height: auto;box-sizing: border-box;">
        <div style="text-align: right;height: 100px;">
            <img src="dist/assets/img/logo.jpg" style="position: absolute;left: 10px;width: 120px;margin:-20px 0 0 0;" />
            <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;font-size:27px;font-weight:bold;">PT SEMUWA DIRGANTARA</p>
            <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">Jl. Yabaso Kompleks Pergudangan Kelas 1A Sentani</p>
            <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">Telp/Fax : (0967) 591915, Telp: 0811484040</p>
            <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">Sentani, Jayapura</p>
        </div>
        <table>
            <tr>
                <td style="width: 20%;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;text-align:left;font-size:22px;font-weight:bold;">INVOICE</p>
                </td>
                <td style="width: 80%;">
                    <hr style="border: 3px solid #000;">
                </td>
            </tr>
        </table>
        <table style="margin:0 0 50px 0;">
            <tr>
                <td style="width: 50%;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0 0 5px 0; padding: 0;text-align: left;">Invoice To</p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;"><?= $data['customer_name'] ? $data['customer_name'] : '-'  ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;"><?= $data['customer_address'] ? $data['customer_address'] : '-'  ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;"><?= $data['customer_phone'] ? $data['customer_phone'] : '-'  ?></p>
                </td>
                <td style="width: 50%;">
                    <table>
                        <tr>
                            <td><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">Invoice ID</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : <?= $data['invoice_number_rev'] ? 'REV.'.$data[0] : $data[0] ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">Date</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : <?= date_ind($data['invoice_date']) ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">Cargo Contract No</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : <?= $data['invoice_contract_no'] ? $data['invoice_contract_no'] : '-' ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">Flight Record No</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : <?= $data['invoice_record_no'] ? $data['invoice_record_no'] : '-' ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;">ITEM NO</p>
                </td>
                <td style="width: 35%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;">DESCRIPTION</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;">TOTAL HOUR</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;">PRICE PER HOUR</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;">EXTENDED PRICE</p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;">1.</p>
                </td>
                <td style="width: 35%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;text-transform:uppercase;"><?= $data['invoice_note'] ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;text-transform:uppercase;">ROUTE: <?= $data['invoice_route_from'].' - '.$data['invoice_route_from'] ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;text-transform:uppercase;">SEBANYAK: <?= $data['invoice_weight'] ? $data['invoice_weight'].'KG' : '-' ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;text-transform:uppercase;">PERIODE: <?= date('d', strtotime($data['invoice_date_period_1'])).' - '.date_ind($data['invoice_date_period_2']) ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;text-transform:uppercase;">SEBESAR ...</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;"><?= $data['invoice_total_hour'] && $data['invoice_total_hour'] != '-' ? $data['invoice_total_hour'].' HOURS' : '' ?></p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;"><?= $data['invoice_price_hour'] && $data['invoice_price_hour'] != '-' ? $data['invoice_price_hour'] : '' ?></p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;text-transform:uppercase;"><?= rupiah($data['invoice_total']) ?></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 50%; border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;text-transform:uppercase;">TERBILANG: # <?= $data['invoice_calculated'] ?> #</p>
                </td>
                <td style="width: 30.6%; border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-left:0;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;">TOTAL</p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;">VAT 1%</p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;">DISCOUNT</p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;">TOTAL INVOICE AMOUNT</p>
                </td>
                <td style="width: 19.4%; border:1px solid #000;padding: 5px;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;"><?= $data['invoice_total'] ? rupiah($data['invoice_total']) : '-'  ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;"><?= $data['invoice_vat'] ? rupiah($data['invoice_vat']) : '-' ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;"><?= $data['invoice_discount'] ? rupiah($data['invoice_discount']) : '-' ?></p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: right;"><?= $data['invoice_amount'] ? rupiah($data['invoice_amount']) : '-' ?></p>
                </td>
            </tr>
        </table>
        <table style="width: 60%;margin:50px 0 0 0;">
            <tr>
                <td>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 14px;font-weight: bold;">PAYMENT DETAIL</p>
                    <table>
                        <tr>
                            <td style="width: 50%;"><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">BANK NAME</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : Bank Mandiri
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">BANK BRANCH</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : Sentani, Kab Jayapura
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">BANK ACCOUNT NUMBER</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : 1540010795759
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;"><p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;text-align: left;font-size: 12px;">BANK ACCOUNT NAME</p></td>
                            <td>
                                <p style="font-family: 'Roboto',sans-serif;line-height:80%;padding:0;margin:0;">
                                : PT SEMUWA DIRGANTARA
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table style="margin-top: 80px;">
            <tr>
                <td style="width: 50%;padding: 5px;">
                </td>
                <td style="width: 50%;text-align: center;">
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:-10px 0 0 0; padding: 0;font-size: 12px;font-weight:bold;">QORIS MADILLAH</p>
                    <p style="font-family: 'Roboto',sans-serif;line-height:80%;margin:0; padding: 0;">Direktur</p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>