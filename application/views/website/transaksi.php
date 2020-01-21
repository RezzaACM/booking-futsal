<?php $this->load->view('website/header') ?>

<style>

    #transksi{
        min-height: 500px;
    }

</style>

<body>

    <!-- Navbar -->
    <?php $this->load->view('website/navbar') ?>

    <!-- jumbotron -->
    <?php $this->load->view('website/jumbotron') ?>

    <section id="transksi">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mt-5">Transaksi List</h4>
                    <table id="myTable" class="table mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Main</th>
                                <th>Jam Main</th>
                                <th>Lapangan</th>
                                <th>Harga/Jam</th>
                                <th>Sewa</th>
                                <th>Total Bayar</th>
                                <th>Status Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($get_trx_user as $row){ ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['tgl_invoice'] ?></td>
                                    <td><?php echo $row['tgl_jadwal'] ?></td>
                                    <td><?php echo $row['jam'] ?></td>
                                    <td><?php echo $row['nm_lap'] ?></td>
                                    <td><?php echo "Rp. ". number_format($row['harga'],2,',',',',) ?></td>
                                    <td><?php echo $row['lama_sewa']." Jam" ?></td>
                                    <td><?php echo "Rp. ". number_format($row['total_harga'],2,',',',',) ?></td>
                                    <?php if($row['status_bayar'] == 0){ ?>
                                        <td><a href="<?php echo base_url('home/payment/'.$row['kd_invoice'])?>" class="btn btn-primary">Belum Bayar</a></td>
                                    <?php }else{?>
                                        <td><a href="" class="btn btn-success">Sudah Lunas</a></td>
                                    <?php }?>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('website/footer') ?>