<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tb_surat_masuk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Nama Pengirim</th>
		<th>Tanggal Surat</th>
		<th>Perihal Surat</th>
		<th>Tanggal Surat Diterima</th>
		<th>Foto Surat</th>
		
            </tr><?php
            foreach ($tb_surat_masuk_data as $tb_surat_masuk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_surat_masuk->no_surat ?></td>
		      <td><?php echo $tb_surat_masuk->nama_pengirim ?></td>
		      <td><?php echo $tb_surat_masuk->tanggal_surat ?></td>
		      <td><?php echo $tb_surat_masuk->perihal_surat ?></td>
		      <td><?php echo $tb_surat_masuk->tanggal_surat_diterima ?></td>
		      <td><?php echo $tb_surat_masuk->foto_surat ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>