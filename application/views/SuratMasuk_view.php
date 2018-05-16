
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
        <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
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
                    <!-- <a class="pull-right navbar-brand" href='<?php echo base_url(); ?>index.php/Login/logoutUser'><i class="fa fa-sign-out fa-fw"></i> Logout</a> -->
                </div>

                

          <ul class="nav navbar-right navbar-top-links">
                   
                   <li class="dropdown">
                       <a href="">
                           <i class="fa fa-sign-out fa-fw"></i>Logout</a>
        
                   </li>
                   </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                        <li>
                                <a href="<?php echo base_url(); ?>/beranda"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>/beranda/smasuk" class="active"><i class="fa fa-bar-chart-o fa-fw"></i> Surat Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>/beranda/skeluar"><i class="fa fa-table fa-fw"></i> Surat Keluar</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                    <h4 class="page-header" style="margin-bottom: 0px;">NIP : <?php echo $this->session->userdata('user_nip'); ?> / Nama : <?php echo $this->session->userdata('user_name'); ?> / Jabatan : <?php echo $this->session->userdata('user_jabatan'); ?></h4>                    
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-12 margin-tb" style="padding-left: 0px;padding-right: 0px;
">
  	                <div class="pull-left">
  	                <h2>Surat Masuk</h2>
  	                </div>
  	                <div class="pull-right">
                          <h1>
                  <button class="btn btn-primary" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Surat Masuk</button>
  	                
                    <?php echo anchor(site_url('tb_surat_masuk/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		            <?php echo anchor(site_url('tb_surat_masuk/word'), 'Word', 'class="btn btn-primary"'); ?>  </h1>
  	                </div>
  	            </div>
                <!-- <h1 style="margin-top: 5px;">Surat Masuk</h1> -->
                
        <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No Surat</th>
                    <th>Nama Pengirim</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal Surat</th>
                    <th>Tanggal Surat Diterima</th>
                    <th>FIle Surat</th>
                    <th style="width:150px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

           
        </table>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">


var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('SuratMasuk/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -3 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -4 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -5 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -6 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -7 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Surat Masuk'); // Set Title to Bootstrap modal title

    $('#photo-preview').hide(); // hide photo preview modal

    $('#label-photo').text('Upload File Surat'); // label photo upload
}

function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('SuratMasuk/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="no_surat"]').val(data.no_surat);
            $('[name="nama_pengirim"]').val(data.nama_pengirim);
            $('[name="tanggal_surat"]').datepicker('update',data.tanggal_surat);
            $('[name="perihal_surat"]').val(data.perihal_surat);
            $('[name="tanggal_surat_diterima"]').datepicker('update',data.tanggal_surat_diterima);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Surat Masuk'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.foto_surat)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<a href="'+base_url+'upload/'+data.foto_surat+'"target="_blank">'+data.foto_surat+'</a>'); // show photo
                
                        
            }
            else
            {
                $('#label-photo').text('Upload File Surat'); // label photo upload
                $('#photo-preview div').text('(No File)');
            }


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

    function logout(){
        if(confirm('Yakin ingin keluar ?')){
            
        }
    }
function save()
{
    if(confirm('Sudah yakin data yang anda masukkan benar?'))
    {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('SuratMasuk/ajax_add')?>";
    } else {
        url = "<?php echo site_url('SuratMasuk/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}
}

function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('SuratMasuk/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Surat Masuk</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">No Surat</label>
                            <div class="col-md-9">
                                <input name="no_surat" placeholder="No Surat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pengirim</label>
                            <div class="col-md-9">
                                <input name="nama_pengirim" placeholder="Nama Pengirim" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Surat</label>
                            <div class="col-md-9">
                                <input name="tanggal_surat" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Perihal Surat</label>
                            <div class="col-md-9">
                                <textarea name="perihal_surat" placeholder="Perihal Surat" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Surat Diterima</label>
                            <div class="col-md-9">
                                <input name="tanggal_surat_diterima" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">File</label>
                            <div class="col-md-9">
                                (No File Surat)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload File Surat </label>
                            <div class="col-md-9">
                                <input name="foto_surat" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

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

