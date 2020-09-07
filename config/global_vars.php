<?php 

use Dompdf\Dompdf;
require 'vendor/autoload.php';
$dompdf = new Dompdf();

function get_url() {
    $env = "dev"; // [production, dev]
    $protocol = $env === 'production' ? 'https://' : 'http://';
    $server_name = $_SERVER['HTTP_HOST']; 
    $app = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $protocol.$server_name.$app;
}

function url_file() {
    $env = "production"; // [production, dev]
    $path_dev = 'http://localhost:80/simkeu/pages/invoice';
    $path_prod = get_url().'/pages/invoice';
    $final_path = $env === 'dev' ? $path_dev : $path_prod;
    return $final_path;
}

function count_table($name) {
    include "connection.php";
    return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $name WHERE deleted_at IS NULL"));
}

function date_ind($param){
    $month = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$split = explode('-', $param);
	return $split[2] . ' ' . $month[ (int)$split[1] ] . ' ' . $split[0];
}

function month_year($a, $b){
    $month = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	return $month[$a].' '.$b;
}

function rupiah($param){
	return number_format($param,0,'.',',');
}

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
    $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
    $key = hash('sha256', $secret_key);    
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function get_user_login($param) {
    include "connection.php";
    $id_user_login = encrypt_decrypt('decrypt', $_COOKIE['user_simkeu']);
    $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM auth_login
                                                    JOIN role_login ON auth_login.role_login_id=role_login.id
                                                    WHERE BINARY auth_login.id='$id_user_login'"));
    return $data[$param];
}

function get_romawi($param) {
    $arr = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
    return $arr[ltrim($param, 0)];
}

function description($param1, $param2) {
    include "connection.php";
    $tmp = "";
    if ($param2 === 'PRODUCT002') {
        $get = mysqli_query($conn, "SELECT * FROM invoices
                            JOIN products ON invoices.product_id=products.id
                            JOIN customers ON invoices.customer_id=customers.id
                            JOIN reg ON invoices.reg_id=reg.id
                            WHERE invoices.id='$param1'") or die (mysqli_error($conn));
    } else {
        $get = mysqli_query($conn, "SELECT * FROM invoices
                            JOIN products ON invoices.product_id=products.id
                            JOIN customers ON invoices.customer_id=customers.id
                            WHERE invoices.id='$param1'") or die (mysqli_error($conn));
    }
    $data = mysqli_fetch_array($get);
    switch($data['product_code']) {
        case 'CRG':
            $tmp = '<p style="text-transform:uppercase;">'.$data['invoice_note'].'</p>'.
                    '<p style="text-transform:uppercase;">route:'.$data['invoice_route_from'].' - '.$data['invoice_route_to'].'</p>'.
                    '<p style="text-transform:uppercase;">sebanyak: '.$data['invoice_weight'].' KG</p>'.
                    '<p style="text-transform:uppercase;">periode: '.date('d', strtotime($data['invoice_date_period_1'])).' - '.date_ind($data['invoice_date_period_2']).'</p>';
        break;
        case 'CRT':
            $tmp = '<p style="text-transform:uppercase;">reg: '.$data['reg_name'].'</p>'.
                    '<p style="text-transform:uppercase;">route: '.$data['invoice_route_from'].' - '.$data['invoice_route_to'].'</p>'.
                    '<p style="text-transform:uppercase;">hours: '.$data['invoice_total_hour'].' HOURS</p>';
        break;
        case 'GH':
            $tmp = '<p style="text-transform:capitalize;">'.$data['invoice_note'].'</p>'.
                    '<p style="text-transform:capitalize;">Datang Tanggal '.date_ind($data['invoice_date_period_1']).'</p>'.
                    '<p style="text-transform:capitalize;">Berangkat Tanggal '.date_ind($data['invoice_date_period_2']).'</p>';
        break;
        default:
            $tmp = '<p style="text-transform:uppercase;">'.$data['invoice_note'].'</p>'.
                    '<p style="text-transform:uppercase;">route:'.$data['invoice_route_from'].' - '.$data['invoice_route_to'].'</p>'.
                    '<p style="text-transform:uppercase;">periode: '.date('d', strtotime($data['invoice_date_period_1'])).' - '.date_ind($data['invoice_date_period_2']).'</p>';
        break;
    }
    return $tmp;
}

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}

?>