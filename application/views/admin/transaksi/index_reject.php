<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item"><a href="#" class="active">Transaction Pending</a></li>
    </ol>
</nav>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('admin/tambah_lapangan') ?>" class="btn btn-success" id="tambahLapangan">Tambah Lapangan <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-hover">
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
                                <!-- <th>Bukti Pembayaran</th> -->
                                <th>Status Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_trx_user as $row) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['tgl_invoice'] ?></td>
                                    <td><?php echo $row['tgl_jadwal'] ?></td>
                                    <td><?php echo $row['jam'] ?></td>
                                    <td><?php echo $row['nm_lap'] ?></td>
                                    <td><?php echo "Rp. " . number_format($row['harga'], 2, ',', ',',) ?></td>
                                    <td><?php echo $row['lama_sewa'] . " Jam" ?></td>
                                    <td><?php echo "Rp. " . number_format($row['total_harga'], 2, ',', ',',) ?></td>
                                    <?php if($row['status_bayar'] == 1){ ?>
                                        <td><button class="btn btn-success">Payment Done</button></td>
                                    <?php }else if($row['status_bayar'] == -1) {?>
                                        <td><button class="btn btn-danger">Rejected Payment</button></td>
                                    <?php }?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // datatable
        $('#myTable').DataTable({

        });


        // add list lapangan
        $(document).on('click', '#tambahLapangan', function(e) {
            e.preventDefault();
            $('.modal-dialog').removeClass('modal-sm');
            $('.modal-dialog').addClass('modal-md');
            $('#modalHeader').html('Tambah Data Item');
            $('#modalContent').load($(this).attr('href'));
            $('#myModal').modal('show');
            // alert('OK');
        });

        $(document).on('click', '#updateLapangan', function(e) {
            e.preventDefault();
            $('.modal-dialog').removeClass('modal-sm');
            $('.modal-dialog').addClass('modal-md');
            $('#modalHeader').html('Tambah Data Item');
            $('#modalContent').load($(this).attr('href'));
            $('#myModal').modal('show');
            // alert('OK');
        });
    });
</script>