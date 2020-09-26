<?php 

$get    = mysqli_query($conn, "SELECT * FROM invoices WHERE id='$_GET[id]'");
$data   = mysqli_fetch_array($get);

?>
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
                            <?php 
                            if ($data['invoice_log_status'] == 'Y' AND $data['invoice_log_filled'] == 'T') {
                            ?>
                            <form action="?page=invoiceeditpro3" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="name">Customer</label>
                                            <select class="form-control" name="customer">
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT * FROM customers");
                                                while($datas = mysqli_fetch_array($sql)) { ?>
                                                    <option value="<?= $datas['id'] ?>" <?= $datas['id'] == $data['customer_id'] ? 'selected' : '' ?>><?= $datas['customer_name'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Contract No</label>
                                                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                                                    <input type="hidden" value="<?= $data_rc['id'] ?>" name="id_log">
                                                    <input class="form-control" type="text" placeholder="Contract No ..." name="contract_no" value="<?= $data['invoice_contract_no'] ?>" autocomplete="OFF">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Record No</label>
                                                    <input class="form-control" type="text" placeholder="Record No ..." name="record_no" value="<?= $data['invoice_record_no'] ?>" autocomplete="OFF">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Date</label>
                                                    <input class="form-control" type="date" name="invoice_date" autocomplete="OFF" value="<?= $data['invoice_date'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="alert alert-primary" role="alert"><span class="fa fa-pencil"></span> Deskripsi</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Total Hour</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" placeholder="Total Hour ..." name="total_hour" value="<?= $data['invoice_total_hour'] ?>" autocomplete="OFF">
                                                        <div class="input-group-append"><span class="input-group-text">Hour</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Price Per Hour</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                        <input class="form-control" type="text" placeholder="Price Per Hour ..." name="price_hour" value="<?= $data['invoice_price_hour'] ?>" autocomplete="OFF">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Reg</label>
                                                    <select class="form-control" name="reg">
                                                    <?php 
                                                        $sql = mysqli_query($conn, "SELECT * FROM reg");
                                                        while($datas = mysqli_fetch_array($sql)){
                                                            echo '<option value="'.$datas['id'].'">'.$datas['reg_name'].'</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Keterangan ..." name="note" autocomplete="OFF" value="<?= $data['invoice_note'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Datang</label>
                                                    <input class="form-control" type="date" placeholder="Extended Price ..." name="date1" autocomplete="OFF" value="<?= $data['invoice_date_period_1'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Berangkat</label>
                                                    <input class="form-control" type="date" placeholder="Extended Price ..." name="date2" autocomplete="OFF" value="<?= $data['invoice_date_period_2'] ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Total</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                <input class="form-control" type="number" placeholder="Total ..." name="total_amount" autocomplete="OFF" value="<?= $data['invoice_total'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                        <a href="?page=invoice" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </form>
                            <?php 
                            } else {
                            ?>
                            <form action="?page=invoicechangereqpro3" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Note!</strong> if the invoice has not been approved by the manager, you must make a request change with added note request change. Change requests can only be changed once.
                                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Note Request Change</label>
                                            <input type="hidden" value="<?= $data['id'] ?>" name="id">
                                            <textarea class="form-control" name="note_rc" rows="3" placeholder="Note Request Change ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Process">
                                        <a href="?page=invoice" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </form>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>