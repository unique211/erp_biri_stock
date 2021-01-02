<!DOCTYPE html>
<?php
	$title = '';
	$title1 = '';
if(isset($title_name)){
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
	  
	  if(($val->menu_id==5 && $val->submenu_id==20) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

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
    .names { font-weight: bold;
		text-align:right;
	 }
    </style>
    </head>
    <body class="overflow-hidden"  >
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
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>To Date</label>
                                                    <div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="date" name="date">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="input-group">
                                                        <input type="submit" class="btn btn-info" id="search" name="search">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="form">
													<?php 	if($export_p==1){ ?>
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
													<?php } ?>
												</div>
                                                </div>
                                            </div>
										</div><br>
									<?php } ?>
                                    <table id="file_info" class="table table-striped" width="100%" cellspacing="0">
                                            <thead id="thead">
                                                <tr>
                                                    <th width="10%">SL No</th>
                                                    <th width="20%">Contractor Name</th>
                                                    <th width="10%" style="text-align:right;">Time</th>
                                                    <th width="10%" >Batch</th>
                                                    <th width="10%" style="text-align:right;"> Tobacco</th> 
                                                    <th width="10%" style="text-align:right;">Leaves</th>
                                                    <th width="10%" style="text-align:right;">Black Yarn</th>
                                                    <th width="10%" style="text-align:right;">White Yarn</th>
                                                    <th width="10%" style="text-align:right;">Filter</th>
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
            </div><!-- /main-container -->
            <!-- Footer -->
            <!--  ================================================== -->
            <?php include "includes/footer.php"; ?>    
        </div><!-- /wrapper -->
        <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
        <!-- Placed at the end of the document so the pages load faster -->
        <?php include "includes/footerlink.php"; ?>   
		<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
		<script>
	var editrt="<?php  echo $edit_p; ?>";
var delrt="<?php  echo $delete_p; ?>";
var read_p="<?php  echo $read_p; ?>";
var create_p="<?php  echo $create_p; ?>";
var export_p="<?php  echo $export_p; ?>";
	
	</script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/Contractor_report.js"></script>
        <script>
            $('#date').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
                autoclose: true,
            });
            var date = new Date();
            date = date.toString('dd/MM/yyyy');
            $("#date").val(date);
			$('#date').on('change', function () {
		
				$(this).datepicker('hide');
});
        </script>
    </body>
</html>
