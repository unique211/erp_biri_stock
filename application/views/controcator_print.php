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
	  
	  if(($val->menu_id==5 && $val->submenu_id==31) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

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
	<link href="<?php echo base_url(); ?>assets/css/endless1.min.css" rel="stylesheet">

    <style>
    .names { font-weight: bold; },
	
	</style>
	<style>
 th, td {
  border: 2px solid gray;
  border-collapse: collapse;
  border-width: 2px; 
  color: black;
}
th, td {
  padding: 5px;
  color: black;
}
.table1 {
  border: 2px solid gray;
  border-collapse: collapse;
  border-width: 2px; 
  color: black;
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
									<form id="pdfgenerate" name="pdfgenerate"  method="POST" action="<?php echo base_url('FinishPS/printbill');?>" target="_blank">
		
		</form> 
		<?php if($create_p==1 || $edit_p ==1){ ?>
                                        <div class="col-sm-12">
                                        <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>From Date</label>
                                                    <div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="fdate" name="fdate" form="pdfgenerate" required>
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>To Date</label>
                                                    <div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="date" name="date" form="pdfgenerate" required>
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
											<div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select id="ctype" name="ctype" class="form-control" form="pdfgenerate" required>
														<option value="Wages">Wages</option>
														<option value="Bonus">Bonus</option>
													

													</select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label></label>
                                                    <div class="input-group">
                                                        <input type="submit" form="pdfgenerate" class="btn btn-info" id="search" name="search">
                                                    </div>
                                                </div>
                                            </div>
                                          
										</div><br>
		<?php } ?>
                                        <div class="col-sm-12">
                                        <div class="table-responsive" id="show_master" style="overflow-x: auto;">
											
                                           
                                 
</div> </div>
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
        <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/myjs/datewisereport.js"></script>
		 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> 
        <script>
            $('#date').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
				autoclose: true,
				minView: 2  });
            $('#fdate').datepicker({
                'todayHighlight':true,
                format: 'yyyy-mm-dd',
				autoclose: true,
				minView: 2
            
        
            });
            var date = new Date();
            date = date.toString('dd/MM/yyyy');
            $("#date").val(date);
            $("#fdate").val(date);
        </script>
    </body>
</html>
