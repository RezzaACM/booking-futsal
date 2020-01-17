<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Admin</a></li>
    <li class="breadcrumb-item"><a href="#" class="active">Lapangan Management</a></li>
  </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo base_url('admin/tambah_lapangan')?>" class="btn btn-success" id="tambahLapangan">Tambah Member  <i class="fa fa-plus"></i></a>
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
                            <th>Full Name</th>
                            <th>Alamat</th>
                            <th>No. Telpon</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($list_member as $row){
                        ?>                        
                            <tr>
                                <td><?php echo $no++?></td>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['alamat'] ?></td>
                                <td><?php echo $row['no_telp'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <?php if($row['status'] == 1){ ?>
                                    <td><span class="btn btn-success">ACTIVE</span></td>
                                <?php }else{?>
                                    <td><span class="btn btn-success">INACTIVE</span></td>
                                <?php }?>
                                <td><a href="">Update</a></td>
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