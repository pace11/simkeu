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
    <title>Charter Invoice</title>
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
                                    JOIN reg ON invoices.reg_id=reg.id
                                    WHERE invoices.id='$_GET[id]'") or die (mysqli_error($conn));
        $data = mysqli_fetch_array($get);
    ?>
    <div style="width:100%;height: auto;box-sizing: border-box;">
        <div style="text-align: center;height: 80px;">
            <img src="dist/assets/img/logo.jpg" style="position: absolute;left: 10px;width: 80px;" />
            <h2>PT. SEMUWA DIRGANTARA</h2>
            <h3 style="margin:15px;padding:0;">INVOICE</h3>
        </div>
        <table>
            <tr>
                <td
                    style="width: 50%; border-bottom:1px solid #000;border-top:0;border-right:0;border-left:0;padding: 15px;">
                    <p style="margin:0; padding: 0;text-align: left;"><strong>INVOICE NO: <?= $data[0] ?></strong></p>
                </td>
                <td
                    style="width: 50%; border-bottom:1px solid #000;border-top:0;border-right:0;border-left:0;padding: 15px;">
                    <p style="margin:0; padding: 0;text-align:right;text-transform:uppercase;"><strong>DATE: <?= date_ind($data['invoice_date']) ?></strong></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="2" style="width: 80%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;text-transform: uppercase;"><strong>PENGGUNA: <?= $data['customer_name'] ?></strong></p>
                </td>
                <td style="width: 60%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;">CHARTER </p>
                    <p style="margin:0; padding: 0;text-align: left;">CONTRACT NO. <?= $data['invoice_contract_no'] ?></p>
                </td>
            </tr>
            <tr>
                <td style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;">FLIGHT </p>
                    <p style="margin:0; padding: 0;text-align: left;">RECORD NO. <?= $data['invoice_record_no'] ?></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="2" style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;"><strong>NO</strong></p>
                </td>
                <td rowspan="2" style="width: 10%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;"><strong>TANGGAL</strong></p>
                </td>
                <td colspan="3" style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;"><strong>DESCRIPTION</strong></p>
                </td>
                <td rowspan="2" style="width: 20%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;"><strong>PRICE</strong></p>
                </td>
            </tr>
            <tr>
                <td style="width: 10%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;"><strong>REG</strong></p>
                </td>
                <td style="width: 45%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;text-transform:uppercase;"><strong>ROUTE</strong></p>
                </td>
                <td style="width: 10%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;text-transform:uppercase;"><strong>HOURS</strong></p>
                </td>
            </tr>
            <tr>
                <td style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;">1.</p>
                </td>
                <td style="width: 10%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;text-transform:uppercase;">
                    <?= date('d-M-y', strtotime($data['invoice_date'])) ?></p>
                </td>
                <td style="width: 10%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;">
                    <?= $data['reg_name'] ?></p>
                </td>
                <td style="width: 45%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;">
                    <?= $data['invoice_route_from'].' - '.$data['invoice_route_to'] ?></p>
                </td>
                <td style="width: 5%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;vertical-align: bottom;text-transform:uppercase;">
                    <?= $data['invoice_total_hour'] ? $data['invoice_total_hour'].' Hours' : '' ?></p>
                </td>
                <td style="width: 25%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: right;text-transform:uppercase;"><strong><?= rupiah($data['invoice_amount']) ?></strong></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td
                    style="width: 50%; border-top:1px solid #000;border-left:1px solid #000;border-bottom:1px solid #000;border-right:0;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;text-transform:uppercase;"></p>
                </td>
                <td
                    style="width: 30%; border-top:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-left:0;padding: 5px;">
                </td>
                <td style="width: 20%; height:20px; border:1px solid #000;padding: 5px;">
                    <span style="float: left;font-size: 8pt;"><strong>Rp</strong></span>
                    <span style="float: right;font-size: 8pt;"><strong><?= rupiah($data['invoice_amount']) ?></strong></span>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 80%; border:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: right;"><strong>DPP</strong></p>
                    <p style="margin:0; padding: 0;text-align: right;"><strong>PPN 10%</strong></p>
                    <p style="margin:0; padding: 0;text-align: right;"><strong>TOTAL</strong></p>
                </td>
                <td
                    style="width: 3%; border-right:0;border-top:1px solid #000;border-bottom:1px solid #000;border-left:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: left;">
                        <strong>Rp</strong>
                    </p>
                    <p style="margin:0; padding: 0;text-align: left;">
                        <strong>Rp</strong>
                    </p>
                    <p style="margin:0; padding: 0;text-align: left;">
                        <strong>Rp</strong>
                    </p>
                </td>
                <td
                    style="width: 17%;border-left:0;border-top:1px solid #000;border-bottom:1px solid #000;border-right:1px solid #000;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: right;">
                        <strong><?= rupiah($data['invoice_total']) ?></strong>
                    </p>
                    <p style="margin:0; padding: 0;text-align: right;">
                        <strong><?= rupiah($data['invoice_ppn']) ?></strong>
                    </p>
                    <p style="margin:0; padding: 0;text-align: right;">
                        <strong><?= rupiah($data['invoice_amount']) ?></strong>
                    </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width:100%;padding:20px 0;">
                    <p style="margin:0; padding: 0;text-align: left;text-transform: capitalize;"><i><strong>Terbilang: # <?= $data['invoice_calculated'] ?> #</strong></i></p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 75%;padding: 5px;">
                </td>
                <td style="width: 25%;padding: 5px;">
                    <p style="margin:0; padding: 0;text-align: center;">PT. SEMUWA DIRGANTARA</p>
                </td>
            </tr>
            <tr>
                <td style="width: 75%;padding: 5px;">
                </td>
                <td style="width: 25%;padding: 5px;">
                    <p style="margin:50px 0 0 0;padding:0;text-align: center;">
                        <u><b>QORIS MADILLAH</b></u><br>
                        Direktur
                    </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 100%;padding: 5px;">
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