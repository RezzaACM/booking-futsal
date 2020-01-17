<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item"><a href="#" class="active">Lapangan Management</a></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('admin/tambah_lapangan')?>" class="btn btn-success" id="tambahLapangan">Tambah Lapangan <i class="fa fa-plus"></i></a>
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
                            <th>Kode Lapangan</th>
                            <th>Nama Lapangan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($list_lapangan as $row){?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['kode'] ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo "Rp."." "; echo number_format($row['harga'], 0,".",".") ?></td>
                            <?php if($row['status'] == 2){ ?>
                                <td><span class="btn btn-danger">Booking</span></td>
                            <?php }else {?>
                                <td><span class="btn btn-success">Available</span></td>
                            <?php }?>
                            <td><a id="updateLapangan" href="<?php echo base_url('admin/update_lapangan/'.$row['id'])?>">Update</a> || <a onclick="return confirm('Yakin menghapus data ini ?');" href="<?php echo base_url('admin/delete_lapangan/'.$row['id'])?>">Delete</a></td>
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