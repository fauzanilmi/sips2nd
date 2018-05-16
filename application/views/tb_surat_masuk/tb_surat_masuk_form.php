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
        <h2 style="margin-top:0px">Tb_surat_masuk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
            <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pengirim <?php echo form_error('nama_pengirim') ?></label>
            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" placeholder="Nama Pengirim" value="<?php echo $nama_pengirim; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
            <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Perihal Surat <?php echo form_error('perihal_surat') ?></label>
            <input type="text" class="form-control" name="perihal_surat" id="perihal_surat" placeholder="Perihal Surat" value="<?php echo $perihal_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Surat Diterima <?php echo form_error('tanggal_surat_diterima') ?></label>
            <input type="text" class="form-control" name="tanggal_surat_diterima" id="tanggal_surat_diterima" placeholder="Tanggal Surat Diterima" value="<?php echo $tanggal_surat_diterima; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Surat <?php echo form_error('foto_surat') ?></label>
            <input type="text" class="form-control" name="foto_surat" id="foto_surat" placeholder="Foto Surat" value="<?php echo $foto_surat; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tb_surat_masuk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>