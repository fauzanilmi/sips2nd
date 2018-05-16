<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_surat_masuk Read</h2>
        <table class="table">
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Nama Pengirim</td><td><?php echo $nama_pengirim; ?></td></tr>
	    <tr><td>Tanggal Surat</td><td><?php echo $tanggal_surat; ?></td></tr>
	    <tr><td>Perihal Surat</td><td><?php echo $perihal_surat; ?></td></tr>
	    <tr><td>Tanggal Surat Diterima</td><td><?php echo $tanggal_surat_diterima; ?></td></tr>
	    <tr><td>Foto Surat</td><td><?php echo $foto_surat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tb_surat_masuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>