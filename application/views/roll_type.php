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
	  
	  if(($val->menu_id==6 && $val->submenu_id==38) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

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
								<!--	<button type="button" class="btn btn-primary btn-xs pull-right btnhideshow"><i class="fa fa-plus"></i>  Add New</button>	-->
							</div>
							<div class="panel-body ">
							<?php if($create_p==1 || $edit_p ==1){ ?>
				<div class="row " id="documents">
								<form id="master_form" name="vendors_form">
									<div class="col-sm-12" >
										<div class="col-sm-4" >
											<div class="form-group">
										<label class="control-label">Role Name*</label>
										<input type="text"  class="form-control input-sm" id="vendor_category" name="vendor_category"  placeholder="Role Name" required  >
											</div><!-- /form-group -->
										</div>
										<div class="col-lg-4" >
											<div class="form-group">
										<label class="control-label">Creation Date</label>
												<div class="input-group date " data-provide="datepicker">
													<input  type="text" class="form-control input-sm placeholdesize datepicker"  id="date" name="date" value="" autocomplete="off" placeholder="Date"  >
														<div class="input-group-addon">
														<span class="fa fa-calender"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4" >
										</div>
									</div>
										<div class="col-sm-12" >
										<div class="col-sm-3" >
											<div class="form-group">
								<label class="control-label">Current Status</label>
											<label class="checkbox-inline" style="margin-left:50px;">
														<input type="checkbox"  id="status" checked data-toggle="toggle"  data-size="mini"    data-on="Active" data-off="Inactive"  data-onstyle="success" data-offstyle="danger"  >
												</label>											</div><!-- /form-group -->
										</div>
										</div>

						<div class="col-lg-12" >
							<input type="hidden" id="save_update" value=""	/>
											&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-danger pull-left delete_data" >Delete</button>
											&nbsp;	&nbsp;	<button type="submit" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
											&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
						</div>

								</form>
					</div>
							<?php } ?>
					<br/>		
						<div class="col-lg-12 ">
										<div class="table-responsive" id="show_master">
                                   </div>


									
								
								
								
				</div>
				</div>
				
						</div><!-- /panel -->
						
					</div><!-- /.col -->
                </div>
            </div><!-- /.padding-md -->
        </div><!-- /main-container -->
        <!-- Footer
        ================================================== -->
    <?php include "includes/footer.php"; ?>    
        
        
    </div><!-- /wrapper -->

    <a href="" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
    </div><!-- /wrapper -->
    
    <!-- Logout confirmation -->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
	<script>
	var editrt="<?php  echo $edit_p; ?>";
var delrt="<?php  echo $delete_p; ?>";
var read_p="<?php  echo $read_p; ?>";
var create_p="<?php  echo $create_p; ?>";
var export_p="<?php  echo $export_p; ?>";

	</script>
    <?php include "includes/footerlink.php"; ?>   
    <script src="<?php echo base_url(); ?>assets/js/myjs/role.js"></script>
	<script>$('#status').bootstrapToggle('on');	</script>	
<script>
$('#date').datepicker({
           'todayHighlight':true,
       });
var date = new Date();
        date = date.toString('dd/MM/yyyy');
       $("#date").val(date);
</script>

    
  </body>
</html>
