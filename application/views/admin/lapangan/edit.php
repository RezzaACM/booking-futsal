<form action="<?php echo base_url('admin/update_lapangan_act')?>" method="post">

<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <label for="kd_lapangan" class="control-label col-md-3">Kode Lapangan</label>
            <div class="col-md-9">
                <input type="hidden" name="id" class="form-control" value="<?php echo $byId[0]['id'] ?>">
                <input autofocus value="<?php echo $byId[0]['kode'] ?>" readonly type="text" name="kd_lapangan" id="kd_lapangan" class="form-control kd_lapangan">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="nama_lap" class="control-label col-md-3">Nama Lapangan</label>
            <div class="col-md-9">
                <input type="text" value="<?php echo $byId[0]['nama'] ?>" name="nama_lap" id="nama_lap" class="form-control nama_lap">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="harga" class="control-label col-md-3">Harga</label>
            <div class="col-md-9">
                <input type="text" name="harga" id="harga" value="<?php echo $byId[0]['harga'] ?>" class="form-control harga">
            </div>
        </div>
    </div>

</div>

<div class="modal-footer">
    <button class='btn btn-primary' id="simpanItem"></button>
</div>

</form>

<script>
    $(document).ready(function(){
        var button = '';
        button += 'SUBMIT'
        $('#modalFooter').remove();
        $('#simpanItem').html(button);
    });
</script>