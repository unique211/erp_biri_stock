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

  <body class="overflow-hidden" >
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
									<!--<button type="button" class="btn btn-primary btn-xs pull-right btnhideshow"><i class="fa fa-plus"></i>  Add New</button>	-->
							</div>
							
						<div class="panel-body ">
							<div class="row " id="documents">
									
								   <form id="master_form" name="master_form"></form>	
                                   <div class="col-sm-12">	
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Voucher Date*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="input-group date doj" data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker" form="master_form"  id="date" name="date"autocomplete="off" placeholder="To Date"  required  >
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Type*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select class="form-control" id="type" name="type" form="master_form">
                                                        <option value=""selected disabled required>Select</option>
                                                        <option value="Purchase">Purchase</option>
                                                        <option value="Sales">Sales</option>
                                                    </select>
                                            </div>
                                        </div>
                                        </div>
                                    <div id="if_pur" class="col-sm-12">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Bill No.*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="bill_no" name="bill_no" form="master_form" placeholder="Bill Number" autocomplete="off"  >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Bill Date*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="input-group date doj" data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker" form="master_form" id="b_date" name="b_date"autocomplete="off" placeholder="Bill Date"    >
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
                                                <label>Party Name*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                                <div class="form-group">
                                                       <select class="form-control input-sm placeholdesize party"  id="cont_name" name="cont_name"  required>
                                                       
                                                       </select>
                                                </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Truck No</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-sm placeholdesize" form="master_form" id="truckno" name="truckno"  placeholder="Truck Number" >
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>Freight</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                                <div class="form-group">
                                                     <input type="text" class="form-control input-sm placeholdesize" form="master_form" id="freight" name="freight"  placeholder="Freight" >
                                                </div>
                                        </div>
                                    <div>
                                    <form id="itemform" name="itemform"></form>
                                    <table id="file_info" class="table table-striped"  cellspacing="0">

                                        	<thead>
												<input type="hidden" id="row" value="0">
												<tr>
                                                                 <th><font style="font-weight:bold">Item Name </font></th>
                                                                 <th><font style="font-weight:bold">Item Batch </font></th>
                                                                 <th><font style="font-weight:bold">Quantity </font></th>
                                                                 <th><font style="font-weight:bold">Alternate Quantity</font></th>
                                                                 <th><font style="font-weight:bold">Item Rate </font></th>
                                                                 <th><font style="font-weight:bold">Amount </font></th>
                                                                 <th><font style="font-weight:bold"></font></th>
                                                                
                                                   
												</tr>
												<tr>
                                                             <input type="hidden" id="ids"/>
                                                                 <td style="text-align:right;">
                                                                      <div class="form-group">
                                                                           <select class="form-control input-sm  placeholdesize item" id="item" style="width:100px" name="item" form="itemform" autocomplete="off" required>
                                                                           
                                                                           </select>
                                                                      </div>
													</td> 
                                                                 <td style="text-align:right;">
                                                                       <div class="form-group">
                                                                       <select class="form-control input-sm  placeholdesize " id="batch"style="width:100px" name="batch" form="itemform" autocomplete="off" required>
                                                                           
                                                                           </select>
                                                                      </div>
													</td> 
        		                                                  <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="qty" name="qty" form="itemform" value="0" placeholder="Quantity"  >
													</td> 
                                		           
                                        		                <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="alt_qty" name="alt_qty" form="itemform" value="0" placeholder="Alternate Quantity" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="rate" name="rate" form="itemform" value="0" placeholder="Item Rate" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="amt" name="amt" form="itemform" value="0" placeholder="Amount" disabled >
													</td> 
                                                    <td><button type="button" class="btn btn-primary btn-xs " form="itemform" id="plus"><i class="fa fa-plus"></i> </button></td>
												</tr>
                                                           
										   	</thead>
                                               <tbody id="file_info_tbody">
                                              
                                               </tbody>
                                               <tfoot>
                                                    <tr>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">Taxable Amount</font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="tax_amt" name="tax_amt"  placeholder="Taxable Amount"disabled ></td>
                                                          <td><font style="font-weight:bold"></font></td>
                                                    </tr>
                                                    <tr>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">IGST%</font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="igst_per"  value="0" name="igst_per"  placeholder="IGST(%)" disabled ></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="igst_amt" name="igst_amt"  placeholder="IGST(amt)" disabled></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                    </tr>
                                                    <tr>
                                                            <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">SGST%</font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="sgst_per"  value="0" name="sgst_per"  placeholder="SGST(%)" ></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="sgst_amt" name="sgst_amt"  placeholder="SGST(amt)"disabled ></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                    </tr>
                                                    <tr>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">CGST%</font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="cgst_per"  value="0" name="cgst_per"  placeholder="CGST(%)" ></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="cgst_amt" name="cgst_amt"  placeholder="CGST(amt)"disabled ></td>
                                                          <th><font style="font-weight:bold"></font></th>
                                                    </tr>
                                                   
                                                    <tr>
                                                    <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">Total</font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="total" name="total"  placeholder="Total"disabled ></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                    </tr>
                                               </tfoot>
                                              
                    	                   
                                    	</table>
                                       
						

						<div class="col-lg-12" >
											<input type="hidden" id="save_update" value="" >
												&nbsp;	&nbsp;	<!--<button type="button" class="btn btn-sm btn-danger pull-left delete_data" >Delete</button>-->
												&nbsp;	&nbsp;	<button type="submit" form="master_form" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
												&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
						</div>

									<br/>
				</div>
				
                     
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Type</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select class="form-control" id="type2" name="type2" >
                                                       
                                                        <option value="Purchase" selected>Purchase</option>
                                                        <option value="Sales">Sales</option>
                                                    </select>
                                            </div>
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
			
			<div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                <h4 class="modal-title">Add Batch Namme</h4>
                                </div>
                                <div class="modal-body" style="width:50%">
                                    <div class="form-group " >
                                        <div class="col-sm-5">
                                            <label te>Batch Name</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" placeholder="Batch Name" id="bname" name="bname">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <input  type="hidden" value="" id="id" name="id"/>
                                    <input type="button" name="action" id="btnsave" value="Save" class="btn btn-success"/>  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/Raw_PS.js"></script>
 
 
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
