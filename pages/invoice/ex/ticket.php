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
    <title>Ticket Invoice</title>
    <style>
        body {
            font-size: 8pt;
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
        $get = mysqli_query($conn, "SELECT * FROM invoices 
                                    JOIN customers ON invoices.customer_id=customers.id
                                    JOIN products ON invoices.product_id=products.id
                                    JOIN auth_login ON invoices.auth_login_id=auth_login.id
                                    WHERE invoices.id='$_GET[id]'") or die (mysqli_error($conn));
        $data = mysqli_fetch_array($get);
    ?>
    <div style="width:100%;height: auto;box-sizing: border-box;border-style: double;">
        <div style="text-align: center;height: 80px;border: 1px solid #000;">
            <img src="dist/assets/img/logo.jpg" style="position: absolute;left: 10px;width: 80px;" />
            <h2>PT. SEMUWA DIRGANTARA</h2>
        </div>
        <table>
            <tr>
                <td colspan="2" style="text-align: center;background: #fab1a0;border:1px solid #000;">
                    <h3 style="margin:15px;padding:0;">INVOICE</h3>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 50%; border:1px solid #000;padding: 15px;">
                    <p style="margin:0; padding: 0;text-align: left;">INVOICE NO: <?= $data[0] ?> </p>
                </td>
                <td style="width: 50%; border:1px solid #000;padding: 15px;">
                    <p style="margin:0; padding: 0;text-align:right;text-transform:uppercase;">DATE: <?= date_ind($data['invoice_date']) ?> </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="2" style="width: 40%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;">MESSRS</p>
                    <p style="margin:0; padding: 0;text-align: center;text-transform: uppercase;"><?= $data['customer_name'] ?></p>
                </td>
                <td style="width: 60%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;">CHARTER </p>
                    <p style="margin:0; padding: 0;text-align: left;">CONTRACT NO. <?= $data['invoice_contract_no'] ?></p>
                </td>
            </tr>
            <tr>
                <td style="width: 60%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;">FLIGHT </p>
                    <p style="margin:0; padding: 0;text-align: left;">RECORD NO. <?= $data['invoice_record_no'] ?></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;">ITEM NO</p>
                </td>
                <td style="width: 35%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;">DESCRIPTION</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;background: #fab1a0;">
                    <p style="margin:0; padding: 0;text-align: center;">TOTAL HOUR</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;background: #fab1a0;">
                    <p style="margin:0; padding: 0;text-align: center;">PRICE PER HOUR</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;background: #fab1a0;">
                    <p style="margin:0; padding: 0;text-align: center;">PRICE PER HOUR</p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;">1.</p>
                </td>
                <td style="width: 35%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;text-transform:uppercase;"><?= $data['invoice_note'] ?></p>
                    <p style="margin:0; padding: 0;text-align: left;text-transform:uppercase;">ROUTE: <?= $data['invoice_route_from'].' - '.$data['invoice_route_from'] ?></p>
                    <p style="margin:0; padding: 0;text-align: left;text-transform:uppercase;">PERIODE: <?= date('d', strtotime($data['invoice_date_period_1'])).' - '.date_ind($data['invoice_date_period_2']) ?></p>
                    <p style="margin:0; padding: 0;text-align: left;text-transform:uppercase;">SEBESAR ...</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;"><?= $data['invoice_total_hour'] ?></p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;"><?= $data['invoice_price_hour'] ?></p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: right;text-transform:uppercase;"><strong><?= rupiah($data['invoice_total']) ?></strong></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 50%; border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;text-transform:uppercase;">TERBILANG: # <?= $data['invoice_calculated'] ?> #</p>
                </td>
                <td style="width: 30%; border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-left:0;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: right;">TOTAL</p>
                    <p style="margin:0; padding: 0;text-align: right;">VAT 10%</p>
                    <p style="margin:0; padding: 0;text-align: right;">PSC</p>
                    <p style="margin:0; padding: 0;text-align: right;">IWJR</p>
                    <p style="margin:0; padding: 0;text-align: right;">TOTAL INVOICE AMOUNT</p>
                </td>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: right;"><strong><?= $data['invoice_total'] ? rupiah($data['invoice_total']) : '-'  ?></strong></p>
                    <p style="margin:0; padding: 0;text-align: right;"><strong><?= $data['invoice_vat'] ? rupiah($data['invoice_vat']) : '-' ?></strong></p>
                    <p style="margin:0; padding: 0;text-align: right;"><strong><?= $data['invoice_vat'] ? rupiah($data['invoice_psc']) : '-' ?></strong></p>
                    <p style="margin:0; padding: 0;text-align: right;"><strong><?= $data['invoice_vat'] ? rupiah($data['invoice_iwjr']) : '-' ?></strong></p>
                    <p style="margin:0; padding: 0;text-align: right;"><strong><?= $data['invoice_amount'] ? rupiah($data['invoice_amount']) : '-' ?></strong></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 70%;padding: 5px;border-bottom:1px solid #000;border-left:1px solid #000;">
                </td>
                <td style="width: 30%;padding: 5px;border-bottom:1px solid #000;border-right:1px solid #000;">
                    <p style="margin:50px 0 0 0;padding:0;text-align: center;">
                        <u><b>WAGUS HIDAYAT</b></u><br>
                        Direktur Utama
                    </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 100%;padding: 5px;border:1px solid #000;">
                    <p style="margin:50px 0 0 0;padding:0;text-align: center;">
                        Jln. Yabaso Kompleks Pergudangan Klas IA Sentani <br>
                        Telp / Faks: (0967) 591915, HP: 0811484040 <br>
                        Sentani - Jayapura
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>