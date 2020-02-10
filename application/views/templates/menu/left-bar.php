<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('') ?>assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('username'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php echo base_url('admin') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('admin/lapangan_management') ?>">
                    <i class="fa fa-soccer-ball-o"></i>
                    <span>Lapangan Management</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('admin/jadwal_management') ?>">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Jadwal</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('admin/waktu_management') ?>">
                    <i class="fa fa-clock-o"></i>
                    <span>Waktu</span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('admin/member_management') ?>">
                    <i class="fa fa-book"></i>
                    <span>Member Lapangan </span>
                </a>
            </li>
            <!-- <li class="">
                <a href="<?php echo base_url('admin/lapangan_management') ?>">
                    <i class="fa fa-group"></i>
                    <span>Customer List</span>
                </a>
            </li> -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Transaction Management</span>
                    <span class="pull-right-container">
                        <!-- <span class="label label-primary pull-right">4</span> -->
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url()?>admin/transaction_pending"><i class="fa fa-circle-o"></i> Transaction Pending</a></li>
                    <li><a href="<?php echo base_url()?>admin/transaction_done"><i class="fa fa-circle-o"></i> Transaction History</a></li>
                    <li><a href="<?php echo base_url()?>admin/transaction_reject"><i class="fa fa-circle-o"></i> Transaction Reject</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo base_url('admin/report') ?>">
                    <i class="fa fa-print"></i>
                    <span>Report</span>
                </a>
            </li>
            <!-- <li class="">
                <a href="<?php echo base_url('admin/report') ?>">
                    <i class="fa fa-gear"></i>
                    <span>Setting</span>
                </a>
            </li> -->
            <hr>
            <li class="">
                <a href="<?php echo base_url('login_auth/logout') ?>">
                    <i class="fa fa-money"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>