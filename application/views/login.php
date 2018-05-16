
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPS</title>
    <link href="dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='container' style='margin-top: 20px;'>
        <div class='row'>
        <div class='col-md-3'></div>
        <div class='col-md-6'>
                <p style="color:red;margin-bottom: 0px;" align="center"><font size="6"><b>Sistem Informasi Pengarsipan Surat</font></b></p>
                <p style="color:grey;" align="center"><b>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Samarinda</b></p>
                <hr size="12px">
                <p align="center" style="margin-bottom: 30px;"><img src="<?php echo base_url() ?>assets/img/DInasSamarinda.png" alt="Dinas Samarinda" width="200" height="206"></p>
                <h1></h1>
            </div>
            <div class='col-md-3'></div>
        <div class='col-md-4'></div>
            <div class='col-md-4'>
                
                <div class='panel'>
                <div class='panel panel-primary'>
                <div class="panel panel-heading" style="margin-bottom: 0px;"><h4>Sign In</h4></div>
                 <form role="form" method="post" action="<?php echo base_url('login/login_user'); ?>" id="login-form">
                    <div class='panel-body'>
                        <!-- validation message for a successful login -->
                        <?php if ($this->session->flashdata('error')) {?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php  } ?>
                        <!-- validation messages for taking inputs -->
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>','</div>');
                        ?>

                       
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label for="user_nip">NIP</label>
                                <input type="nip" class="form-control login-field" name="user_nip" id="nip" placeholder="NIP" required="">
                                <label class="login-field-icon fui-user" for="login-name"></label>
                            </div>
                            <div class="form-group">
                                <label for="user_password">Password</label>
                                <input type="password" class="form-control login-field" name="user_password" id="password" placeholder="Password" required="">
                                <label class="login-field-icon fui-user" for="login-pass"></label>
                            </div>
                        

                    </div>
                    <div class="panel panel-footer" style="margin-bottom: 0px;">
                    <p align = "right"><button name="btn-login" id="btn-login" type="submit" class="btn btn-primary">Sign In</button></p>
                    </div>
                     </form>
                </div>
                </div>
            </div>
            <div class='col-md-4'></div>
            
        </div>

    </div>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-v2/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>bootstrap-show-password.js"></script>
  <script>
    $(function() {
      $('#password').password().on('show.bs.password', function(e) {
        $('#eventLog').text('On show event');
        $('#methods').prop('checked', true);
      }).on('hide.bs.password', function(e) {
        $('#eventLog').text('On hide event');
        $('#methods').prop('checked', false);
      });
      $('#methods').click(function() {
        $('#password').password('toggle');
      });
    });
  </script>
    </body>
</html>
