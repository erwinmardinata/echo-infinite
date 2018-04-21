<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/elaadmin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/elaadmin/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/elaadmin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/datatables/datatables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
        .sidebar-nav > ul > li > a .label {
            position: absolute;
            right: 15px;
            top: auto;
        }
    </style>

    <script src="<?php echo base_url(); ?>assets/elaadmin/js/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/lib/bootstrap/js/chosen.jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/elaadmin/js/custom.min.js"></script>
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b style="color: #fff">siJINAK</b>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
             <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="color: #FFF;">
                                    <?php 
                                        $user = $this->db->where('id', $this->session->userdata('id'))
                                                          ->get('user')->row();
                                        echo $user->nama;
                                    ?>
                                    
                                </span> 
                                <img src="<?php echo base_url(); ?>assets/elaadmin/images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                                    <li><a href="<?php echo site_url('Auth/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <?php if($this->session->userdata('hak_akses') == 1) { ?>
                        <li class="nav-label">USER</li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <li> 
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Pegawai</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Pegawai'); ?>">Data Pegawai</a></li>
                                <li><a href="<?php echo site_url('Pegawai/tambah'); ?>">Tambah Pegawai</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Petugas Pemeriksa</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Petugas_pemeriksa'); ?>">Data Petugas</a></li>
                                <li><a href="<?php echo site_url('Petugas_pemeriksa/tambah'); ?>">Tambah Petugas</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">User</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('User'); ?>">Data user</a></li>
                                <li><a href="<?php echo site_url('User/tambah'); ?>">Tambah user</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-paw"></i><span class="hide-menu">Komoditi</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Entitas_ternak'); ?>">Data Komoditi</a></li>
                                <li><a href="<?php echo site_url('Entitas_ternak/tambah'); ?>">Tambah Komoditi</a></li>
                            </ul>
                        </li>
                        <?php } else  if($this->session->userdata('hak_akses') == 2) { ?>
                        <li class="nav-label">KECAMATAN</li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <li> 
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-paw"></i><span class="hide-menu">Ternak</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Ternak'); ?>">Data Ternak</a></li>
                                <li><a href="<?php echo site_url('Ternak/tambah_baru'); ?>">Input Ternak Baru</a></li>
                                <li><a href="<?php echo site_url('Ternak/tambah_lama'); ?>">Input Ternak Belum Terdata</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="hide-menu">
                            Bantuan </span>
                            </a>
                        </li>
                        <?php } else  if($this->session->userdata('hak_akses') == 3) { ?>
                        <li class="nav-label">Kabupaten</li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <?php

                            $cek = $this->db->get('data_permohonan')->result();
                            $x=0;
                            $y=0;
                            foreach($cek as $row) {
                                if($row->status == 1) {
                                    $x++;
                                } 
                                if($row->status == 2) {
                                    $y++;
                                } 
                            }

                        ?>
                        <li> <a class="" href="<?php echo site_url('Data_permohonan'); ?>" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Permohonan Baru<span class="label label-rouded label-success pull-right"><?php echo $x; ?></span></span></a>
                        </li>
                        <li> <a class="" href="<?php echo site_url('Pemeriksaan'); ?>" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Pemeriksaan<span class="label label-rouded label-success pull-right"><?php echo $y; ?></span></span></a>
                        </li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="hide-menu">
                            Bantuan </span>
                            </a>
                        </li>
                        <?php } else  if($this->session->userdata('hak_akses') == 4) { ?>
                        <li class="nav-label">Provinsi</li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <?php

                            $cek = $this->db->get('data_permohonan')->result();
                            $x=0;
                            $y=0;
                            foreach($cek as $row) {
                                if($row->status == 1) {
                                    $x++;
                                } 
                                if($row->status == 2) {
                                    $y++;
                                } 
                            }

                        ?>
                        <li> <a class="" href="<?php echo site_url('Data_permohonan'); ?>" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Permohonan Baru<span class="label label-rouded label-success pull-right"><?php echo $x; ?></span></span></a>
                        </li>
                        <li> <a class="" href="<?php echo site_url('Pemeriksaan'); ?>" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Pemeriksaan<span class="label label-rouded label-success pull-right"><?php echo $y; ?></span></span></a>
                        </li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="hide-menu">
                            Bantuan </span>
                            </a>
                        </li>
                        <?php } else  if($this->session->userdata('hak_akses') == 6 || $this->session->userdata('hak_akses') == 7) { ?>
                        <li class="nav-label">PEMOHON</li>
                        <li> 
                            <a class="" href="<?php echo site_url('Permohonan'); ?>" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span>
                            </a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Permohonan</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Permohonan/data_pemohon'); ?>">Data Pemohon</a></li>
                            </ul>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Permohonan/tambah'); ?>">Input Permohonan</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-print"></i><span class="hide-menu">Cetak</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo site_url('Permohonan/cetak'); ?>">Permohonan</a></li>
                            </ul>
                        </li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Bayar </span>
                            </a>
                        </li>
                        <li> 
                            <a class="" href="#" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="hide-menu">
                            Bantuan </span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <div style="min-height: 500px">
                
                <?php echo $content; ?>

            </div>
             
            <!-- footer -->
            <footer class="footer"> © <?php echo date('Y'); ?> Dinas Peternakan dan Kesehatan Hewan. <!-- Template designed by <a href="https://colorlib.com">Colorlib</a> --></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->

</body>

</html>