<?php $this->load->view('website/header') ?>

<body>

  <!-- Navbar -->
  <?php $this->load->view('website/navbar') ?>

  <!-- jumbotron -->
  <?php $this->load->view('website/jumbotron') ?>

  <style>
    #booking {
      min-height: 400px;
    }
  </style>


  <section id="booking">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form-group" action="<?php echo base_url('home/booking') ?>" method="post">
            <div class="row justify-content-center mt-5">
              <div class="col-md-4">
                <div class="row">
                  <label for="dari" class="control-label col-md-2" style="padding-top:5px;">Tanggal</label>
                  <div class="col-md-9">
                    <input required autocomplete="off" type="date" class="form-control" name="date" id="myDate" placeholder="YYYY-MM-DD">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <label for="sampai" class="contorl-label col-md-2" style="padding-top:5px;">Jam</label>
                  <div class="col-md-9">
                    <select required class="form-control" name="jam" id="">
                      <option value="">Pilih Jam</option>
                      <?php foreach ($list_jam as $row) { ?>
                        <option value="<?php echo $row['jam'] ?>"><?php echo $row['jam'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <button onclick="showFunction() " id="cari" class="btn btn-primary">Cari <i class="fa fa-search"></i> </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Lapangan</th>
                <th scope="col">Nama Lapangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam</th>
                <th scope="col">Harga</th>
                <th scope="col">Status</th>
                <!-- <?php if ($cek_jadwal[0]['status'] == 1){ ?>
                  <th scope="col">Action</th>
                <?php }else if ($cek_jadwal == null){?>
                  <th></th>
                <?php }?> -->
              </tr>
            </thead>
            <tbody>
              <?php if ($cek_jadwal == null) { ?>
                <tr>
                  <td colspan="6" class="text-center"> <a href="<?php echo base_url() ?>" class="btn btn-primary" id="book">Booking lapangan <i class="fa fa-plus"></i></a></td>
                </tr>
              <?php } else if ($cek_jadwal[0]['status'] == 0) { ?>
                <?php $no = 1;
                foreach ($cek_jadwal as $row) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['kode'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['tgl_jadwal'] ?></td>
                    <td><?php echo $row['jam'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <?php if ($row['status'] == 0) { ?>
                      <td>
                        <button class="btn btn-danger">Booked</button>
                      </td>
                    <?php } ?>
                  </tr>
                <?php } ?>
              <?php } else if ($cek_jadwal[0]['status'] == 1) { ?>
                <?php $no = 1;
                foreach ($cek_jadwal as $row) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['kode'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['tgl_jadwal'] ?></td>
                    <td><?php echo $row['jam'] ?></td>
                    <td><?php echo "Rp. " . number_format($row['harga'], 2, ',', '.') ?></td>
                    <?php if ($row['status'] == 1) { ?>
                      <td>
                        <button class="btn btn-success">Available</button>
                      </td>
                    <?php } ?>
                    <td>
                      <a href="<?php echo base_url() ?>" class="btn btn-primary" id="book">Booking lapangan <i class="fa fa-plus"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

  <!-- <script>
    $("#myDate").datepicker({
      format: "yyyy-mm-dd",
      // read
    });
    $("#myDateSampai").datepicker({
      format: "yyyy-mm-dd",
      // read
    });
  </script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#book', function(e) {
        e.preventDefault(e);
        $('.modal-dialog').removeClass('modal-sm');
        $('.modal-dialog').addClass('modal-lg');
        $('.modal-header').html('Booking Lapangan');
        // $('#modalContent').load($(this).attr('href'));
        $('#modalKu').modal('show');
      });
    });
  </script>



  <div class="modal fade" id="modalKu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking lapangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalContent">
          <form action="<?php echo base_url('home/transaction_act') ?>" method="post">
            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <label for="invoice" class="control-label col-md-3">No. Invoice</label>
                  <div class="col-md-9">
                    <input autofocus type="text" readonly value="<?php echo $generate_inv ?>" name="invoice" id="invoice" class="form-control time">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <label for="user" class="control-label col-md-3">Nama Pemboking</label>
                  <div class="col-md-9">
                    <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                    <input type="text" value="<?php echo $this->session->userdata('nama') ?>" name="nama_user" id="user" class="form-control user">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <label for="kd_lapangan" class="control-label col-md-3">Nama Lapangan</label>
                  <div class="col-md-9">
                    <select class="form-control" name="lapangan" id="">
                      <?php foreach ($list_lapangan as $row) { ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <label for="tanggal" class="control-label col-md-3">Tanggal</label>
                  <div class="col-md-9">
                    <input type="date" value="<?php echo $generate_inv ?>" name="tanggal" id="invoice" class="form-control time">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <label for="tanggal" class="control-label col-md-3">Jam</label>
                  <div class="col-md-9">
                    <select name="jam" class="form-control" id="jam">
                      <?php foreach ($list_jam as $row) { ?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['jam'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <div class="row">
                  <label for="sewa" class="control-label col-md-3">Lama Sewa</label>
                  <div class="col-md-6">
                    <input type="number" value="" name="sewa" id="sewa" class="form-control time">
                  </div>
                  <span class="col-md-3">Jam</span>
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Booking</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <?php $this->load->view('website/footer') ?>