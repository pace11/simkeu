<div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="?page=beranda">Home</a></li>
        <li class="breadcrumb-item active"><a href="?page=invoice">Invoice</a></li>
        <li class="breadcrumb-item active">Tambah Data Invoice</li>
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-accent-primary">
                        <div class="card-header">Tambah Data Invoice</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Product</label>
                                        <select class="form-control" name="product" id="product">
                                        <option style="display:none;">-- pilih salah satu --</option>
                                        <?php 
                                            $sql = mysqli_query($conn, "SELECT * FROM products");
                                            while($datas = mysqli_fetch_array($sql)){
                                                echo '<option value="'.$datas['id'].'">'.$datas['product_name'].'</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="PRODUCT001">
                                <form action="?page=invoiceaddpro1" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">User</label>
                                                        <p><span class="fa fa-user"></span> <?= get_user_login('name') ?></p>
                                                        <input type="hidden" class="input_product" name="product" value="">
                                                        <input type="hidden" id="userku" name="id_user" value="<?= get_user_login(0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="name">Customer</label>
                                                        <select class="form-control" name="customer">
                                                        <?php 
                                                            $sql = mysqli_query($conn, "SELECT * FROM customers");
                                                            while($datas = mysqli_fetch_array($sql)){
                                                                echo '<option value="'.$datas['id'].'">'.$datas['customer_name'].'</option>';
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Contract No</label>
                                                        <input class="form-control" type="text" placeholder="Contract No ..." name="contract_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Record No</label>
                                                        <input class="form-control" type="text" placeholder="Record No ..." name="record_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Date</label>
                                                        <input class="form-control" type="date" name="invoice_date" autocomplete="OFF" required>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Total Hour</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" placeholder="Total Hour ..." name="total_hour" autocomplete="OFF">
                                                            <div class="input-group-append"><span class="input-group-text">Hour</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Price Per Hour</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="text" placeholder="Price Per Hour ..." name="price_hour" autocomplete="OFF">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Keterangan ..." name="note" autocomplete="OFF">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Sebanyak</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Sebanyak ..." name="qty" autocomplete="OFF">
                                                    <div class="input-group-append"><span class="input-group-text">Kg</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Periode</label>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="date" placeholder="Extended Price ..." name="date1" autocomplete="OFF">
                                                    </div>
                                                    <div class="col-md-2" style="display:flex; justify-content:center; align-items: center;">
                                                        <span class="badge badge-primary">SAMPAI</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="date" placeholder="Extended Price ..." name="date2" autocomplete="OFF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Route</label>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="text" placeholder="Asal ..." name="asal" autocomplete="OFF">
                                                    </div>
                                                    <div class="col-md-2" style="display:flex; justify-content:center; align-items: center;">
                                                        <span class="badge badge-primary">KE</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="text" placeholder="Tujuan ..." name="tujuan" autocomplete="OFF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Diskon</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="number" placeholder="Diskon ..." name="discount" autocomplete="OFF">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Total</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="number" placeholder="Total ..." name="total_amount" autocomplete="OFF">
                                                        </div>
                                                    </div>
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
                            </div>
                            <div id="PRODUCT002">
                                <form action="?page=invoiceaddpro2" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">User</label>
                                                        <p><span class="fa fa-user"></span> <?= get_user_login('name') ?></p>
                                                        <input type="hidden" class="input_product" name="product" value="">
                                                        <input type="hidden" id="userku" name="id_user" value="<?= get_user_login(0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="name">Customer</label>
                                                        <select class="form-control" name="customer">
                                                        <?php 
                                                            $sql = mysqli_query($conn, "SELECT * FROM customers");
                                                            while($datas = mysqli_fetch_array($sql)){
                                                                echo '<option value="'.$datas['id'].'">'.$datas['customer_name'].'</option>';
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Contract No</label>
                                                        <input class="form-control" type="text" placeholder="Contract No ..." name="contract_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Record No</label>
                                                        <input class="form-control" type="text" placeholder="Record No ..." name="record_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Date</label>
                                                        <input class="form-control" type="date" name="invoice_date" autocomplete="OFF" required>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Hour</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" placeholder="Total Hour ..." name="total_hour" autocomplete="OFF">
                                                            <div class="input-group-append"><span class="input-group-text">Hour</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
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
                                                <label for="name">Route</label>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="text" placeholder="Asal ..." name="asal" autocomplete="OFF" required>
                                                    </div>
                                                    <div class="col-md-2" style="display:flex; justify-content:center; align-items: center;">
                                                        <span class="badge badge-primary">KE</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="text" placeholder="Tujuan ..." name="tujuan" autocomplete="OFF" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">DPP</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                    <input class="form-control" type="number" placeholder="DPP ..." name="total_amount" autocomplete="OFF" min="1" max="999999999" required>
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
                            </div>
                            <div id="PRODUCT003">
                                <form action="?page=invoiceaddpro3" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">User</label>
                                                        <p><span class="fa fa-user"></span> <?= get_user_login('name') ?></p>
                                                        <input type="hidden" class="input_product" name="product" value="">
                                                        <input type="hidden" id="userku" name="id_user" value="<?= get_user_login(0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="name">Customer</label>
                                                        <select class="form-control" name="customer">
                                                        <?php 
                                                            $sql = mysqli_query($conn, "SELECT * FROM customers");
                                                            while($datas = mysqli_fetch_array($sql)){
                                                                echo '<option value="'.$datas['id'].'">'.$datas['customer_name'].'</option>';
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Contract No</label>
                                                        <input class="form-control" type="text" placeholder="Contract No ..." name="contract_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Record No</label>
                                                        <input class="form-control" type="text" placeholder="Record No ..." name="record_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Date</label>
                                                        <input class="form-control" type="date" name="invoice_date" autocomplete="OFF" required>
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
                                                            <input class="form-control" type="text" placeholder="Total Hour ..." name="total_hour" autocomplete="OFF">
                                                            <div class="input-group-append"><span class="input-group-text">Hour</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Price Per Hour</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="text" placeholder="Price Per Hour ..." name="price_hour" autocomplete="OFF">
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
                                                <input class="form-control" type="text" placeholder="Keterangan ..." name="note" autocomplete="OFF" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Tanggal Datang</label>
                                                        <input class="form-control" type="date" placeholder="Extended Price ..." name="date1" autocomplete="OFF" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Tanggal Berangkat</label>
                                                        <input class="form-control" type="date" placeholder="Extended Price ..." name="date2" autocomplete="OFF" required>
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
                                                    <input class="form-control" type="number" placeholder="Total ..." name="total_amount" autocomplete="OFF" required>
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
                            </div>
                            <div id="PRODUCT004">
                                <form action="?page=invoiceaddpro4" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">User</label>
                                                        <p><span class="fa fa-user"></span> <?= get_user_login('name') ?></p>
                                                        <input type="hidden" class="input_product" name="product" value="">
                                                        <input type="hidden" id="userku" name="id_user" value="<?= get_user_login(0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="name">Customer</label>
                                                        <select class="form-control" name="customer">
                                                        <?php 
                                                            $sql = mysqli_query($conn, "SELECT * FROM customers");
                                                            while($datas = mysqli_fetch_array($sql)){
                                                                echo '<option value="'.$datas['id'].'">'.$datas['customer_name'].'</option>';
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Contract No</label>
                                                        <input class="form-control" type="text" placeholder="Contract No ..." name="contract_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Record No</label>
                                                        <input class="form-control" type="text" placeholder="Record No ..." name="record_no" autocomplete="OFF">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Date</label>
                                                        <input class="form-control" type="date" name="invoice_date" autocomplete="OFF" required>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Total Hour</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" placeholder="Total Hour ..." name="total_hour" autocomplete="OFF">
                                                            <div class="input-group-append"><span class="input-group-text">Hour</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Price Per Hour</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="text" placeholder="Price Per Hour ..." name="price_hour" autocomplete="OFF">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Keterangan ..." name="note" autocomplete="OFF" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Periode</label>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="date" placeholder="Extended Price ..." name="date1" autocomplete="OFF">
                                                    </div>
                                                    <div class="col-md-2" style="display:flex; justify-content:center; align-items: center;">
                                                        <span class="badge badge-primary">SAMPAI</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="date" placeholder="Extended Price ..." name="date2" autocomplete="OFF">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="name">Route</label>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="text" placeholder="Asal ..." name="asal" autocomplete="OFF" required>
                                                    </div>
                                                    <div class="col-md-2" style="display:flex; justify-content:center; align-items: center;">
                                                        <span class="badge badge-primary">KE</span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input class="form-control" type="text" placeholder="Tujuan ..." name="tujuan" autocomplete="OFF" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Total</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="number" placeholder="Total ..." name="total_amount" autocomplete="OFF" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">IWJR</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="number" placeholder="IWJR ..." name="iwjr" autocomplete="OFF">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">PSC</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                                            <input class="form-control" type="number" placeholder="PSC ..." name="psc" autocomplete="OFF">
                                                        </div>
                                                    </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
$(function () {
    $('#PRODUCT001,#PRODUCT002,#PRODUCT003,#PRODUCT004').hide();
    $('#product').change(function(){
        var $option = $(this).find('option:selected');
        var value = $option.val();
        $('.input_product').val(value)
        if (value === 'PRODUCT001') {
            $('#'+value).show(500);
            $('#PRODUCT002,#PRODUCT003,#PRODUCT004').hide(500);
        } else if (value === 'PRODUCT002') {
            $('#'+value).show(500);
            $('#PRODUCT001,#PRODUCT003,#PRODUCT004').hide(500);
        } else if (value === 'PRODUCT003') {
            $('#'+value).show(500);
            $('#PRODUCT001,#PRODUCT002,#PRODUCT004').hide(500);
        } else {
            $('#'+value).show(500);
            $('#PRODUCT001,#PRODUCT002,#PRODUCT003').hide(500);
        }
    })
});
</script>