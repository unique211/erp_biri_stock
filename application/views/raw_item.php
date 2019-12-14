<!DOCTYPE html>
<?php
	$title = '';
	$title1 = '';
if(isset($title_name)){
	$title = $title_name;
	$title1 = $title_name1;
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
							<div class="row " id="documents">
									
								   <form id="master_form" name="master_form">
									<div class="col-sm-12">
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Transfer Date*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                        <div class="input-group date doj" data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date" name="date" placeholder="Date" autocomplete="off" required  >
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
									
									
									
									</div>
									<div class="col-sm-12">
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Transfer From*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                        <select class="form-control input-sm  placeholdesize cont"  id="t_from" name="t_from" autocomplete="off" required>
                                                
                                                </select>
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Batch*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                        <select class="form-control input-sm  placeholdesize batch" id="batch1" name="batch1" autocomplete="off" required>
											
                                                       </select>
                                        </div>
                                    </div>
									
									</div>
									<div class="col-sm-12">
    									<div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Biri Leaves Qty</label>
                                            </div>
                                        </div>
					    				<div class="col-sm-3">
						        			<div class="form-group">
												<input type="text" class="form-control input-sm placeholdesize" style="text-align:right;" id="b_qty"  value="0"name="b_qty" placeholder="0"  >
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Tobacco Qty</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                    <input type="text" class="form-control input-sm placeholdesize" id="t_qty" value="0" style="text-align:right;" name="t_qty" placeholder="0"  >
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Bags</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                    <input type="text" class="form-control input-sm placeholdesize" id="bags" value="0" style="text-align:right;" name="bags" placeholder="0"  >
                                            </div>
                                        </div>
									</div>
                                             <div class="col-sm-12">
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Transfer To*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                        <select class="form-control input-sm  placeholdesize cont"  id="t_to" name="t_to" autocomplete="off" required>
                                                
                                                </select>
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Batch*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                        <select class="form-control input-sm  placeholdesize batch" id="batch2" name="batch2" autocomplete="off" required>
											
                                                       </select>
                                        </div>
                                    </div>
									
									</div>
                                   

						<div class="col-lg-12" >
											<input type="hidden" id="save_update" value="" >
												&nbsp;	&nbsp;	<!--<button type="button" class="btn btn-sm btn-danger pull-left delete_data" >Delete</button>-->
												&nbsp;	&nbsp;	<button type="submit" id="btnsave" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
												&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
						</div>

									</form>
				</div>
                <br/>
          
                    <div class="col-sm-2">
                                   <div class="form-group">
                                            <label>Date</label>
                                        </div>
                                    </div>
							<div class="col-sm-4">
                                        <div class="form-group">
                                        <div class="input-group date doj" data-provide="datepicker">
                                                            <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date2" name="date2" placeholder="To Date"    >
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-calender"></span>
                                                            </div>
											            </div>
                                        </div>
                                    </div>
					
						<div class="col-lg-12 ">
										<div class="table-responsive" id="show_master">
											
									    </div>
                                   </div>


				
						</div><!-- /panel -->
						
						<div class="panel-body ">
							<div class="col-md-12">
								<div class="container pull-left" style="padding:20px;max-width:100%; overflow:auto;">
									
								</div>
								
							</div><!--col-->
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/myjs/raw_item.js"></script>
 
 
<script>
$('#date #date2').datepicker({
           'todayHighlight':true,
       });
var date = new Date();
        date = date.toString('dd/MM/yyyy');
        
       $("#date").val(date);
       $("#date2").val(date);
	   
	   
</script>

    
  </body>
</html>
