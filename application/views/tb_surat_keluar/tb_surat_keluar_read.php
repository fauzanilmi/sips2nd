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
        <h2 style="margin-top:0px">Tb_surat_keluar Read</h2>
        <table class="table">
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Tgl Surat</td><td><?php echo $tgl_surat; ?></td></tr>
	    <tr><td>Nama Pengirim</td><td><?php echo $nama_pengirim; ?></td></tr>
	    <tr><td>Perihal Surat</td><td><?php echo $perihal_surat; ?></td></tr>
	    <tr><td>Waktu Input</td><td><?php echo $waktu_input; ?></td></tr>
	    <tr><td>Foto Surat</td><td><?php echo $foto_surat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tb_surat_keluar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>