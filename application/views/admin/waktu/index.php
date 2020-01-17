<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item"><a href="#" class="active">Waktu Management</a></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('admin/tambah_waktu')?>" class="btn btn-success" id="tambahWaktu">Tambah Waktu <i class="fa fa-plus"></i></a>
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
                            <th>Jam</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_waktu as $row){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo date("H:i", strtotime($row['jam'])); ?></td>
                            <td><a onclick="return confirm('Yakin ingin menghapus?')" href="<?php echo base_url('admin/hapus_waktu_act/'.$row['id'])?>">Hapus</a></td>
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
    $(document).on('click','#tambahWaktu', function(e){
        e.preventDefault();
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
		$('#modalHeader').html('Tambah Data Item');
        $('#modalContent').load($(this).attr('href'));
        $('#myModal').modal('show');
        // alert('OK');
    });

    $(document).on('click','#updateWaktu', function(e){
        e.preventDefault();
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-md');
		$('#modalHeader').html('Tambah Data Item');
        // $('#modalContent').load($(this).attr('href'));
        $('#myModal').modal('show');
        // alert('OK');
    });
});
</script>