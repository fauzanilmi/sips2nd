
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SIPS</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url() ?>assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url() ?>assets/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url() ?>assets/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url() ?>assets/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
html,body{  height: 100%; }
#wrapper{height: 100%;}
#page-wrapper{min-height: 100%;}


        </style>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url() ?>beranda"><img src="https://upload.wikimedia.org/wikipedia/id/3/38/Logo_Kota_Samarinda.png" alt="Dinas Samarinda" width="25" height="26"></a>
                    <a class="navbar-brand" href="<?php echo base_url() ?>beranda">Sistem Informasi Pengarsipan Surat</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                

              <ul class="nav navbar-right navbar-top-links">
                   
                   <li class="dropdown">
                       <a href='<?php echo base_url(); ?>index.php/login/user_logout' onclick="return confirm('Apakah anda yakin akan keluar?')">
                           <i class="fa fa-sign-out fa-fw"></i>Logout</a>
        
                   </li>
                   </ul>
                
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                        <li>
                                <a href="<?php echo base_url(); ?>beranda"class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>beranda/smasuk" ><i class="fa fa-bar-chart-o fa-fw"></i> Surat Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>beranda/skeluar"><i class="fa fa-table fa-fw"></i> Surat Keluar</a>
                            </li>
               
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">NIP : <?php echo $this->session->userdata('user_nip'); ?> / Nama : <?php echo $this->session->userdata('user_name'); ?> / Jabatan : <?php echo $this->session->userdata('user_jabatan'); ?></h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                <h1>Selamat Datang di SIPS</h1>
            </div>
               
                    
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/raphael.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/morris.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url() ?>assets/js/startmin.js"></script>

    </body>
</html>
