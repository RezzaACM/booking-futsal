<section id="navbar">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Rookie Futsal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="<?php echo base_url('home')?>">Home <span class="sr-only">(current)</span></a>
            <?php if($this->session->userdata('nama')  != null){ ?>
              <a class="nav-item nav-link" href="<?php echo base_url()?>home/booking">Booking</a>
              <a class="nav-item nav-link" href="#">Transaksi</a>
              <!-- <a class="nav-item nav-link" href="#">Pengaturan</a> -->
              <a class="nav-item nav-link" href="#">Hi, <?php echo $this->session->userdata('nama') ?></a>
              <a onclick="return confirm('Anda yakin untuk keluar ?') " class="nav-item nav-link" href="<?php echo base_url()?>home/logout">Logout</a>
             </div>
            <?php }else{?>
              <a class="nav-item nav-link" href="<?php echo base_url()?>home/login_member">Login</a>  
            <?php }?>
        </div>
      </div>
    </nav>
</section>