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
        <h2 style="margin-top:0px">Tb_surat_keluar List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('tb_surat_keluar/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('tb_surat_keluar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tb_surat_keluar'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Tgl Surat</th>
		<th>Nama Pengirim</th>
		<th>Perihal Surat</th>
		<th>Waktu Input</th>
		<th>Foto Surat</th>
		<th>Action</th>
            </tr><?php
            foreach ($tb_surat_keluar_data as $tb_surat_keluar)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tb_surat_keluar->no_surat ?></td>
			<td><?php echo $tb_surat_keluar->tgl_surat ?></td>
			<td><?php echo $tb_surat_keluar->nama_pengirim ?></td>
			<td><?php echo $tb_surat_keluar->perihal_surat ?></td>
			<td><?php echo $tb_surat_keluar->waktu_input ?></td>
			<td><?php echo $tb_surat_keluar->foto_surat ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('tb_surat_keluar/read/'.$tb_surat_keluar->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('tb_surat_keluar/update/'.$tb_surat_keluar->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('tb_surat_keluar/delete/'.$tb_surat_keluar->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('tb_surat_keluar/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('tb_surat_keluar/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>