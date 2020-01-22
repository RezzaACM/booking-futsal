<?php $this->load->view('website/header') ?>

<body>

    <!-- Navbar -->
    <?php $this->load->view('website/navbar') ?>

    <!-- jumbotron -->
    <?php $this->load->view('website/jumbotron') ?>

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>SELAMAT DATANG DI ROOKIE FUTSAL</h1>
                    <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt at dolorum veniam? Ducimus expedita asperiores quod saepe, rem neque laboriosam ad laborum! Natus quidem maxime suscipit ut, optio nisi culpa quae adipisci accusamus, quos iusto? Fuga esse ducimus illum tenetur ab eveniet ut placeat expedita accusamus distinctio eum ex quo rem voluptate vel aliquid recusandae aperiam sit dicta quos atque hic optio, vero id! Aut quo facilis voluptatem consequuntur, velit esse praesentium dolor alias iste debitis ex sed eaque, non mollitia numquam veritatis unde nostrum laudantium quos, voluptatibus obcaecati? Placeat maiores provident neque voluptates. Accusantium numquam illo saepe blanditiis et?</P>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal -->
    <section id="jadwal">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Daftar Lapangan</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Lapangan</th>
                                <th scope="col">Nama Lapangan</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($lapangan as $row){ ?>
                                <tr>
                                    <td><?php echo $no++?></td>
                                    <td><?php echo $row['kode'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo "Rp. " .number_format($row['harga'],2,',',',') ?></td>
                                </tr>
                            <?php }?>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <?php $this->load->view('website/footer') ?>