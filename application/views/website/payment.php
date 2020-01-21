<?php $this->load->view('website/header') ?>

<style>
    #pelunasan {
        min-height: 400px;
    }
</style>

<body>

    <!-- Navbar -->
    <?php $this->load->view('website/navbar') ?>

    <!-- jumbotron -->
    <?php $this->load->view('website/jumbotron') ?>

    <!-- About -->
    <section id="pelunasan">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-4 text-center">Pelunasan Pembayaran</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Kode Invoice</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $get_kd_invoice[0]['kd_invoice'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Nama Pemesan</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $get_kd_invoice[0]['nama'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Tanggal Pesan</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $get_kd_invoice[0]['tgl_invoice'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Tanggal Main</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $get_kd_invoice[0]['tgl_jadwal'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Jam Main</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $get_kd_invoice[0]['jam'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Nama Lapangan</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo $get_kd_invoice[0]['nm_lap'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Jumlah Bayar</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <h5><?php echo "Rp. " . number_format($get_kd_invoice[0]['total_harga'], 2, ',', ','); ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>Bukti Pembayaran</h5>
                </div>
                <div class="col-md-2">
                    <h5>:</h5>
                </div>
                <div class="col-md-4">
                    <form action="<?php echo base_url('home/update_transaction') ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="kd_invoice" value="<?php echo $get_kd_invoice[0]['kd_invoice'] ?>" id="kd_invoice">
                        <input type="file" class="form-control" name="struk">

                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h5>&nbsp;</h5>
                </div>
                <div class="col-md-2">
                    <h5>&nbsp;</h5>
                </div>
                <div class="col-md-4">
                    <h5><button type="submit" class="form-control mt-2 btn btn-success">Submit</button></h5>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('website/footer') ?>