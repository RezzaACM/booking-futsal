<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item"><a href="#" class="active">Jadwal Management</a></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('admin/tambah_jadwal')?>" class="btn btn-success" id="tambahLapangan">Tambah Jadwal  <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
            <div class="box-body">
                <table id="myTable" class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Kode Lapangan</th>
                            <th>Nama Lapangan</th>
                            <th>Harga</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($list_jadwal as $row){
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['tgl_jadwal'] ?></td>
                            <td><?php echo $row['kode'] ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['harga'] ?></td>
                            <td><?php echo $row['jam'] ?></td>
                                <?php if($row['status'] == 1){ ?>
                                    <td><span class="btn btn-success">Available</span></td>
                                <?php }else{?>
                                    <td><span class="btn btn-danger">Booked</span></td>
                                <?php }?>
                            <td><a id="tambahLapangan" href="">Update</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    // datatable
    $('#myTable').DataTable({

    });


    // add list lapangan
    $(document).on('click','#tambahLapangan', function(e){
        e.preventDefault();
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
		$('#modalHeader').html('Tambah Data Item');
        $('#modalContent').load($(this).attr('href'));
        $('#myModal').modal('show');
        // alert('OK');
    });

    $(document).on('click','#updateLapangan', function(e){
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