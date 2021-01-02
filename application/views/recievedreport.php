<!DOCTYPE html>
<?php
$title = '';
$title1 = '';
if (isset($title_name)) {
    $title = $title_name;
    $title1 = $title_name1;
}
?>
<?php
$edit_p=0;
$delete_p=0;
$read_p=0;
$create_p=0;
$export_p=0;
?>
 <?php foreach($sidebar as $val){ 
	  
	  if(($val->menu_id==5 && $val->submenu_id==25) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

		$create_p=$val->create_p;
		$edit_p=$val->edit_p;
		$delete_p=$val->delete_p;
		$read_p=$val->read_p;
		$export_p=$val->export_p;

	  }
  } 
	 ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include "includes/headerlink.php"; ?>
    <style>
        .names {
            font-weight: bold;
        }

        .texes1 {
            text-align: right;
        }
    </style>
</head>

<body class="overflow-hidden">
    <!-- Overlay Div -->
    <div id="overlay" class="transparent"></div>
    <div id="wrapper" class="preload">
        <?php include "includes/header.php"; ?>
        <?php include "includes/sidebar.php"; ?>
        <div id="main-container">
            <div id="breadcrumb">
                <ul class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>contiloe/dashboard"> Home</a></li>
                    <li class="active"><?php echo $title1 ?></li>
                </ul>
            </div><!-- /breadcrumb-->
            <div class="padding-md">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b><?php echo $title1 ?></b>
                            </div>
                            <div class="panel-body ">
                                <div class="row " id="documents">
								<?php if($create_p==1 || $edit_p ==1){ ?>	
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Date From </label>
                                                <div class="input-group date " data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker doj" id="fdate" name="fdate">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Date To </label>
                                                <div class="input-group date " data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker doj" id="date" name="date">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										 <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Batch Dropdown</label>
                                                
                                                    <select class="form-control input-sm  placeholdesize batch" id="batch" name="batch" autocomplete="off" required="">
                                                    </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Wages Dropdown</label>
                                               
                                                    <select class="form-control input-sm  placeholdesize wages" id="wages" name="wages" autocomplete="off" required="">
                                                    </select>
                                               
                                            </div>
                                        </div>
										

                                    </div>
									<div class="col-sm-12">
										<div class="col-sm-5">
										</div>
										<div class="col-sm-2">
                                            <div class="form-group">
                                            <label></label>
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-info" id="search" name="search">
                                                </div>
                                            </div>
                                        </div>
										<div class="col-sm-3">
										</div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="form">
												<?php 	if($export_p==1){ ?>
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
												<?php } ?>
												</div>
                                            </div>
                                        </div>
										
									</div>
								<?php } ?>
                                    <div>
                                       <!-- <div class="col-sm-2"> <div class="form-group"> <div class="form"><label>Filter Combination</label></div></div></div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Batch Dropdown</label>
                                                <div class="form">
                                                    <select class="form-control input-sm  placeholdesize batch" style="width:110px;" id="batch" name="batch" autocomplete="off" required="">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Wages Dropdown</label>
                                                <div class="form">
                                                    <select class="form-control input-sm  placeholdesize wages" style="width:110px;" id="wages" name="wages" autocomplete="off" required="">
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                    </div><br>
                                    <div class="col-sm-12">
                                        <div class="table-responsive" id="show_master" style="overflow-x: auto;">


                                            <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;">
                                                <thead id="thead">
                                                    <tr>
                                                        <!-- <th>SL No</th> -->
                                                        <th>Contractor Name</th>
                                                        <th>Batch</th>
                                                        <th>Asal Bidi</th>
                                                        <th>Chant Bidi Pcs</th>
                                                        <th>Chant Bidi Kgs</th>
                                                        <th>Wages Group</th>
                                                    </tr>

                                                </thead>
                                                <tbody id="tbody"></tbody>
                                                <tfoot id="tfoot"></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /main-container -->
        <!-- Footer -->
        <!--  ================================================== -->
        <?php include "includes/footer.php"; ?>
    </div><!-- /wrapper -->
    <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <?php include "includes/footerlink.php"; ?>
    <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/recievedReport.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
    <script>
        $('#date').datepicker({
            'todayHighlight': true,
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        $('#fdate').datepicker({
            'todayHighlight': true,
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
        $("#date").val(date);
        $("#fdate").val(date);
    </script>
</body>

</html>
