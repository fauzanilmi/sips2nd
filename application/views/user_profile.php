<?php
$user_id=$this->session->userdata('user_id');

if(!$user_id){

  redirect('login/login_view');
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Profile Dashboard-CodeIgniter Login Registration</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  </head>
  <body>

      <div class='container' style='margin-top: 100px;'>
        <div class='row'>
<!--         <div class='col-md-3'></div> -->
        <div class='col-md-12'>
            <p align="center" style="margin-bottom: 30px;"><img src="<?php echo base_url() ?>assets/img/DInasSamarinda.png" alt="Dinas Samarinda" width="200" height="206"></p>
                <p style="color:black;margin-bottom: 0px;" align="center"><font size="6"><b>Selamat Datang di </font></b></p>
                <p style="color:black;margin-bottom: 0px;" align="center"><font size="7"><b>Sistem Informasi Pengarsipan Surat</font></b></p>
                <p style="color:black;margin-bottom: 0px;" align="center"><font size="6"><b>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Samarinda</font></b></p>
        
                <p style="color:grey;" align="center"><font size="4"><b><?php echo $this->session->userdata('user_name'); ?> (<?php echo $this->session->userdata('user_nip'); ?>)</font></p>

                <hr width="50%">
               
                <h1></h1>
                <!-- <p align = "center"><a href="<?php echo base_url('login/user_logout');?>" >  <button type="button" class="btn-primary">Halaman Utama</button></a></p> -->
                <p align = "center"><a href="<?php echo base_url('beranda');?>" >  <button type="button" class="btn-primary">Halaman Utama</button></a></p>
                
            </div>
<!--             <div class='col-md-3'></div> -->

      <!-- <table class="table table-bordered table-striped">


        <tr>
          <th colspan="2"><h4 class="text-center">User Info</h3></th>

        </tr>
          <tr>
            <td>User Name</td>
            <td><?php echo $this->session->userdata('user_name'); ?></td>
          </tr>
          <tr>
            <td>User Email</td>
            <td><?php echo $this->session->userdata('user_email');  ?></td>
          </tr>
          <tr>
            <td>User Age</td>
            <td><?php echo $this->session->userdata('user_age');  ?></td>
          </tr>
          <tr>
            <td>User Mobile</td>
            <td><?php echo $this->session->userdata('user_mobile');  ?></td>
          </tr>
      </table>
 -->


</div>
  </body>
</html>
