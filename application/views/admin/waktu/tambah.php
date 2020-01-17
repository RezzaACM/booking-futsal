<form action="<?php echo base_url('admin/tambah_waktu_act')?>" method="post">

<div class="col-md-12">
    <div class="form-group">
        <div class="row">
            <label for="time" class="control-label col-md-3">Jam</label>
            <div class="col-md-9">
                <input autofocus type="text" name="time" id="time" class="form-control time">
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

<script>
$(function () {
    $('#time').datetimepicker({
         format: 'HH:mm',
    });

});
</script>