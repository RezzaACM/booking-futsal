<?php $this->load->view('website/header') ?>
<body>

  <!-- Navbar -->
<?php $this->load->view('website/navbar') ?>
    
  <!-- jumbotron -->
<?php $this->load->view('website/jumbotron') ?>
  
<section id="login_member">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                        <h1 style="font-size: 30px;">Login Member Roki Futsal!</h1>
                        </div>

                        <!-- Login Form -->
                        <form method="post" action="<?php echo base_url('home/login_act') ?>">
                        <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
                        <input type="password" id="password" class="fadeIn third" name="pass" placeholder="password">
                        <input type="submit" class="fadeIn fourth" value="Log In">
                        </form>

                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                        <a class="underlineHover" href="<?php echo base_url('home/register_member')?>">atau Daftar disini!</a>
                        </div>

                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('website/footer') ?>