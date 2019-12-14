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
									<div class="col-sm-2">
                                   <div class="form-group">
                                            <label>Date*</label>
                                        </div>
                                    </div>
							<div class="col-sm-4">
                                        <div class="form-group">
                                        <div class="input-group date doj" data-provide="datepicker">
                                                            <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date" name="date" placeholder="To Date"  required  >
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-calender"></span>
                                                            </div>
											            </div>
                                        </div>
                                    </div>
                                  
                                    <table id="product" class="table table-striped" width="100%" cellspacing="0">
                                        	<thead>
												
												<tr>
                                                                 <th style="display:none;"><font style="font-weight:bold">id</font></th>
                                                                 <th style="width:50%;"><font style="font-weight:bold">Batch Name </font></th>
                                                                 <th style="width:30%;"><font style="font-weight:bold">No. of Cartons </font></th>
                                                                 <th style="width:50%; text-align:right;" ><font style="font-weight:bold" >Total Bidi </font></th>
                                                                
												</tr>
												
										   	</thead>
                                               <tbody id="product_body"></tbody>
                                               <tfoot id="product_footer"></tfoot>
                    	                   
                                    	</table>
							

						<div class="col-lg-12" >
											<input type="hidden" id="save_update" value="" >
												&nbsp;	&nbsp;	<!--<button type="button" class="btn btn-sm btn-danger pull-left delete_data" >Delete</button>-->
												&nbsp;	&nbsp;	<button type="submit" id="btnsave" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
												&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
						</div>

									</form>
				</div>
                    <br/>
                    <div style="border-bottom: 2px solid;"></div> <br/>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>From Date</label>
                            </div>
                        </div>
						<div class="col-sm-3">
                            <div class="form-group">
                                <div class="input-group date doj" data-provide="datepicker">
                                    <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date2" name="date2" placeholder="To Date"    >
                                    <div class="input-group-addon">
                                        <span class="fa fa-calender"></span>
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>To Date</label>
                            </div>
                        </div>
						<div class="col-sm-3">
                            <div class="form-group">
                                <div class="input-group date doj" data-provide="datepicker">
                                    <input type="text" class="form-control input-sm placeholdesize datepicker"  id="date3" name="date2" placeholder="To Date"    >
                                    <div class="input-group-addon">
                                        <span class="fa fa-calender"></span>
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" id="filter" value="Filter" name="filter" class="btn btn-primary"/>
                        </div>
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/finished_product.js"></script>
 
 
<script>
$('#date2 #date').datepicker({
           'todayHighlight':true,
       });
var date = new Date();
        date = date.toString('dd/MM/yyyy');
        
       $("#date2").val(date);
       $("#date").val(date);
       $("#date3").val(date);
	   
</script>

    
  </body>
</html>
