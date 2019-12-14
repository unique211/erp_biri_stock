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
                                            <label>Item Name*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control item" id="item_name" name="item_name" required>
												
											</select>
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Batch Name*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm placeholdesize" id="batch_name" name="batch_name" placeholder="Batch Name" required  >
                                        </div>
                                    </div>
									</div>
									<div class="col-sm-12">
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Quantity*</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm placeholdesize" id="quantity" name="quantity" placeholder="Quantity" required  >
                                        </div>
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Balance Raw Quantity</label>
                                        </div>
                                    </div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                             <input type="hidden" id="bal_raw_qty" value="" >
                                            <input type="text" class="form-control input-sm placeholdesize" id="balance_raw_qnt" name="balance_raw_qnt" placeholder="Balance Raw Quantity"  disabled>
                                        </div>
                                    </div>
									</div>
                                    <div class="col-sm-12">
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Alternative Unit</label>
                                        </div>
                                    </div>
									<div class="col-sm-2">
										<div class="form-group">
                                            <select class="form-control" id="alt_unit" name="alt_unit" >
												<option value=""selected disabled >Select</option>
												<option value="BOX">BOX</option>
												<option value="BAGS">BAGS</option>
											</select>
                                        </div>
                                       
                                    </div>
									<div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Alternative Quantity</label>
                                        </div>
                                    </div>
									<div class="col-sm-2">
										<div class="form-group">
												<input type="text" class="form-control input-sm placeholdesize" id="alt_qty" name="alt_qty" placeholder="Alternative Quantity"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Balance Alternative Quantity</label>
                                        </div>
                                    </div>
									<div class="col-sm-2">
										<div class="form-group">
                                                <input type="hidden" id="bal_alt_qty" value="" >
												<input type="text" class="form-control input-sm placeholdesize" id="balance_alt_qty" name="balance_alt_qty" placeholder="Balance Alternative Qty" disabled >
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/dynamic.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/myjs/Batch_wise_stock.js"></script>
 
 
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
