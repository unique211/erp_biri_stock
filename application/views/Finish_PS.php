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
                                                <label>Sale Date</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <div class="input-group date doj" data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker" form="master_form"  id="date" name="date"autocomplete="off" placeholder="To Date"    >
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Invoice Number</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <input type="text" class="form-control input-sm placeholdesize" form="master_form" id="invoice" name="invoice"  placeholder="Invoice Number"disabled >
                                            </div>
										</div>
										<div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Gst Invoice Number</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                            <input type="text" class="form-control input-sm placeholdesize" form="master_form" id="gstinvoice" name="gstinvoice"  placeholder="Gst Invoice Number" >
                                            </div>
                                        </div>
                                        </div>
                                    
                                    <div class="col-sm-12">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Sale To*</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <div class="form-group">
                                                       <select class="form-control input-sm  placeholdesize party"  id="saleto" name="saleto" autocomplete="off" required>
                                                       
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
                                                                 <th><font style="font-weight:bold">Batch Name </font></th>
                                                                 <th><font style="font-weight:bold">Current Stock </font></th>
                                                                 <th><font style="font-weight:bold">Pack No. </font></th>
                                                                 <th><font style="font-weight:bold">Qty in Pcs</font></th>
                                                                 <th><font style="font-weight:bold">Rate Per 1000 </font></th>
                                                                 <th><font style="font-weight:bold">Total Value </font></th>
                                                                 <th><font style="font-weight:bold"></font></th>
                                                                
                                                   
												</tr>
												<tr>
                                                             <input type="hidden" id="ids"/>
                                                                 <td style="text-align:right;">
                                                                      <div class="form-group">
                                                                           <select class="form-control input-sm  placeholdesize" id="batch" style="width:160px" name="batch" form="itemform" autocomplete="off" required>
                                                                           
                                                                           </select>
                                                                      </div>
													</td> 
                                                                 <td style="text-align:right;">
                                                                       <div class="form-group">
                                                                       <input type="text" class="form-control input-sm placeholdesize" form="itemform" id="stock" name="stock"  placeholder="Current Stock"disabled >
                                                                      </div>
													</td> 
        		                                                  <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="pack" name="pack" form="itemform" value="0" placeholder="Pack No."  >
													</td> 
                                		           
                                        		                <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="qty" name="qty" form="itemform"value="0"  placeholder="Qty in Pcs" >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="rate" name="rate" form="itemform" value="0" placeholder="Rate Per 1000 " >
													</td> 
                                                                 <td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="tot_val" name="tot_val" form="itemform" value="0" placeholder="Total Value" disabled >
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
                                                          <td><font style="font-weight:bold"></font></td>
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
                                                          <td><font style="font-weight:bold"> </font></td>
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
                                                          <td><font style="font-weight:bold"> </font></td>
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
                                                          <th><font style="font-weight:bold"></font></th>
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
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                    </tr>
                                                    <tr>
                                                    <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">Basic</font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="basic_per"  value="0" name="basic_per"  placeholder="Basic(%)"  ></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="basic_amt" name="basic_amt"  placeholder="Basic(amt)" disabled></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                    </tr>
                                                    <tr>
                                                    <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold">NCCD</font></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="nccd_per"  value="0" name="nccd_per"  placeholder="NCCD(%)"  ></td>
                                                          <td><input type="text" class="form-control input-sm placeholdesize" form="master_form" id="nccd_amt" name="nccd_amt"  placeholder="NCCD(amt)" disabled></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                          <td><font style="font-weight:bold"> </font></td>
                                                    </tr>
                                               </tfoot>
                                              
                    	                   
                                    	</table>
                                       
						

						<div class="col-lg-12" >
											<input type="hidden" id="save_update" value="" >
												&nbsp;	&nbsp;	

												&nbsp;	&nbsp;	<button type="submit" id="btnsave" form="master_form" class="btn btn-sm btn-success btn-sm pull-right" style="margin-right:1%;">Save</button>
												&nbsp;	&nbsp;	<button type="button" class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
						</div>
						<input type="hidden" form="pdfgenerate" id="btnprint" name="btnprint">
						<form id="pdfgenerate" name="pdfgenerate"  method="POST" action="<?php echo base_url('FinishPS/printfinish');?>" target="_blank">
		
		</form>  
									<br/>
				</div>
				
                     
                <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Sale From Date</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="input-group date doj" data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker" form="master_form"  id="date2" name="date2"autocomplete="off" placeholder="Sale Date"    >
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-calender"></span>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Sale To Date</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="input-group date doj" data-provide="datepicker">
                                                    <input type="text" class="form-control input-sm placeholdesize datepicker" form="master_form"  id="date3" name="date3"autocomplete="off" placeholder="Sale Date"    >
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
    <script src="<?php echo base_url(); ?>assets/js/myjs/Finish_PS.js"></script>
 
 
<script>
$('#date #date2').datepicker({
           'todayHighlight':true,
       });
var date = new Date();
        date = date.toString('dd/MM/yyyy');
        
       $("#date").val(date);
     //  $("#date2").val(date);
	   
	   
</script>

    
  </body>
</html>
