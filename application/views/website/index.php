<?php $this->load->view('website/header') ?>

<body>

    <!-- Navbar -->
    <?php $this->load->view('website/navbar') ?>

    <!-- jumbotron -->
    <?php $this->load->view('website/jumbotron') ?>

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>SELAMAT DATANG DI ROKI FUTSAL</h1>
                    <P>Untuk Melakukan Proses Booking Silahkan Ikuti Langkah Berikut :
<br>1. Silahkan Daftar Member
<br>2. Lakukan Login Terlebih Dahulu
<br>3. Pilih Jadwal Yang Tersedia
<br>4. Isi Data Pemesan
<br>5. Lakukan Konfirmasi
<br>6. Lakukan Pembayaran</P>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal -->
    <section id="jadwal">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Daftar Lapangan</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Lapangan</th>
                                <th scope="col">Nama Lapangan</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($lapangan as $row){ ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $row['kode'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo "Rp. " .number_format($row['harga'],2,',',',') ?></td>
                                </tr>
                            <?php }?>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('website/footer') ?>