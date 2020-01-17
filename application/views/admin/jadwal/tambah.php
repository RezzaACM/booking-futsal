<form action="<?php echo base_url('admin/tambah_jadwal_act')?>" method="post">

<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <label for="tanggal" class="control-label col-md-3">Tanggal</label>
            <div class="col-md-9">
                <input autofocus type="date" name="tanggal" id="tanggal" class="form-control tanggal">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="kd_lapangan" class="control-label col-md-3">Nama Lapangan</label>
            <div class="col-md-9">
                <select class="form-control" name="lapangan" id="">
                    <?php foreach($list_lapangan as $row){ ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label for="nm_lapangan" class="control-label col-md-3">Jam</label>
            <div class="col-md-9">
                <select class="form-control" name="jam" id="">
                    <?php foreach($list_waktu as $row){?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['jam'] ?></option>
                    <?php }?>
                </select>
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