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

?>
 <?php foreach($sidebar as $val){ 
	  
	  if(($val->menu_id==2 && $val->submenu_id==7) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 || $val->export_p	==1)){

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
									
								   <form id="master_form" name="master_form">	
								  
									<div class="col-6">
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Name*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                        <input type="text" class="form-control " id="name" name="name" placeholder="Name" required  > 
                                        </div>
                                    </div>
									
									
									<div class="col-sm-8">
                                        <div class="form-group">
                                          <!--     <label>Label Name*</label>-->
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                          <!--  <input type="text" class="form-control " id="labelname" name="labelname" placeholder="Label Name" required  > -->
                                        </div>
                                    </div>
									</div>
									<br>
									<div class="col-6">
									<div class="col-sm-2">
                                       <div class="form-group">
                                            <label>Packing Type*</label>
                                        </div>
                                    </div>
									<div class="col-sm-3">
                                        <div class="form-group">
											<input type="number" style="width:50px;text-align:right" id="ratio1" name="ratio1"  required  >&nbsp;&nbsp; X &nbsp;&nbsp;
											<input type="number" style="width:50px;text-align:right" id="ratio2" name="ratio2"  required  >&nbsp;&nbsp; X&nbsp;&nbsp;
											<input type="number" style="width:50px;text-align:right" id="ratio3" name="ratio3"  required  >
                                        </div>
                                    </div>

								
									<div class="col-sm-2">
                                        <div class="form-group">
										<label>Label Name*</label>
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
										<input type="text" class="form-control " id="labelname" name="labelname" placeholder="Label Name" required  >
                                        </div>
                                    </div>
									
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Opening Cartun*</label>
                                        </div>
                                    </div>
									<div class="col-sm-1">
                                        <div class="form-group">
                                           <input type="text" class="form-control " id="opening_cartun" name="opening_cartun" placeholder="Op.Cart." required  >
                                        </div>
                                    </div>
									</div>

									<br>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Opening Pcs</label>
                                        </div>
                                    </div>
									<div class="col-sm-10">
                                        <div class="form-group">
                                           <input type="text" class="form-control " id="opening_pcs" name="opening_pcs" placeholder="Opening Pcs" disabled  >
                                        </div>

										
                                    </div>
									
									<br>
									<div class="col-6">
									<div class="col-sm-2">
                                        <div class="form-group">
										<label>Consumption Ratio </label>
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
										<input type="text" class="form-control" id="congection" name="congection" placeholder="Consumption Ratio"  disabled >
                                        </div>
                                    </div>
									<div class="col-sm-1">
                                       <div class="form-group">
                                            <label>Asal Bidi*</label>
                                        </div>
                                    </div>
									<div class="col-sm-3">
                                        <div class="form-group">
											<input type="text" class="form-control"   id="asalbidi" name="asalbidi" placeholder="Asal Bidi" required >
										
                                        </div>
                                    </div>
									
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Chant Bidi*</label>
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                           <input type="text" class="form-control " id="chantbidi" name="chantbidi" placeholder="Chant Bidi" required  >
                                        </div>
                                    </div>
									</div>
									<br>
									<div class="col-sm-12" >
									<table id ="disbuget" class="table table-striped" style="width:100%";>
									<thead>
										<tr>
										<td style="display:none;">sr</td>
										<td style="display:none;">itemid</td>
										<td>Item Name</td>
										<td>Quantity</td>
										<td>Unit</td>
										</tr>
									</thead>
									<tbody>
									</tbody>
									</table>	
									</div>
									
						

						<div class="col-lg-12" >
											<input type="hidden" id="save_update" value="" >
												&nbsp;	&nbsp;	<!--<button type="button" class="btn btn-sm btn-danger pull-left delete_data" >Delete</button>-->
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

						</div><!--panel body-->
                        
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
    <?php include "includes/footerlink.php"; ?>   
	<script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
	<script>
	var editrt="<?php  echo $edit_p; ?>";
var delrt="<?php  echo $delete_p; ?>";
var read_p="<?php  echo $read_p; ?>";
var create_p="<?php  echo $create_p; ?>";
var export_p="<?php  echo $export_p; ?>";
	
	</script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/myjs/packing_batch.js"></script>
 
<script>
$('.doj').datepicker({
           'todayHighlight':true,
       });
var date = new Date();
        date = date.toString('dd/MM/yyyy');
        
       $("#doj").val(date);
	   
	   
</script>

    
  </body>
</html>
