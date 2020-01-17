<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <form class="form-group" action="<?php echo base_url('admin/report') ?>" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label for="dari" class="control-label col-md-2" style="padding-top:5px;">Dari</label>
                                            <div class="col-md-9">
                                                <input required autocomplete="off" type="date" class="form-control" name="dari" id="" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <label for="sampai" class="contorl-label col-md-2" style="padding-top:5px;">Sampai</label>
                                            <div class="col-md-9">
                                                <input required autocomplete="off" type="date" class="form-control" name="sampai" id="" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary">Cari <i class="fa fa-search"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($get_trx_user == null) { ?>
                                            <tr>
                                                <th class="text-center" colspan="9">Data yang dicari kosong</th>
                                            </tr>
                                        <?php } else { ?>
                                            <?php $no = 1;
                                            $grandTotal = 0;
                                            foreach ($get_trx_user as $row) {
                                                $grandTotal += $row['total_harga'];
                                            ?>
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
                                                </tr>
                                            <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-right" colspan="8">Grand Total</th>
                                            <th><?php echo "Rp. " . number_format($grandTotal, 2, ',', ',',) ?></th>
                                        <?php } ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>