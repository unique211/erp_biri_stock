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
<style>.swal2-overflow {
  overflow-x: visible;
  overflow-y: visible;
}</style>
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
									<!--<button type="button" class="btn btn-primary btn-xs pull-right btnhideshow"><i class="fa fa-plus"></i>  Add New</button>	-->
								</div>
								<div class="panel-body ">
									<div class="row " id="documents">
									<form id="master_form" name="master_form">	
								   		<div class="col-sm-12">
                                        	<div class="form-group">
												<div class="col-sm-3">
													<label>Contractor/Party/Ledger*</label>
													<select class="form-control input-sm placeholdesize" id="party" name="party" required form="master_form">
														<option value="" selected disabled>Select</option>
														<option  value="contractor">Contractor</option>
														<option value="party">Party</option>
														<option value="ledger">Ledger</option>
													</select>
												</div>
												<div class="col-sm-2" id="len1">
													<label>Ledger*</label>
													<select class="form-control input-sm" id="ledger1" name="ledger1" form="master_form"  >
														<option value="" selected disabled>--Select--</option>
														<option value="sundry_debitors">Sundry Debitors</option>
														<option value="sundry_creditors">Sundry Creditors</option>
													</select>
												</div>
												<div class="col-sm-2" id="len">
													<label>Ledger*</label>
													<select class="form-control input-sm" id="ledger" name="ledger" form="master_form"  >
														<option value="" selected disabled>--Select--</option>
														<option value="bank_account">Bank Accounts</option>
														<option value="cash_in_hand">Cash-In-Hand</option>
														<option value="sundry_debitors">Sundry Debitors</option>
														<option value="sundry_creditors">Sundry Creditors</option>
														<option value="direct_expenses">Direct Expenses</option>
														<option value="indirect_expenses">Indirect Expenses</option>
														<option value="purchase_account">Purchase Accounts</option>
														<option value="sales_account">Sales Accounts</option>
														<option value="capital_account">Capital Accounts</option>
														<option value="fixed_assets">Fixed Assets</option>
														<option value="investments">Investments</option>
														<option value="unsecure_loans">Unsecured Loans</option>
													</select>
												</div>
												<div class="col-sm-2">
													<label>Name*</label>
													<input type="text" class="form-control input-sm placeholdesize" id="name" name="name" form="master_form" placeholder="Name" required >
												</div>
                                        		<div class="col-sm-3">
													<label>State*</label>
													<select class="form-control input-sm state  placeholdesize" id="state" name="state" required form="master_form">
													</select>
												</div>
												<div class="col-sm-2">
													<label>State Code</label>
													<input type="text" disabled class="form-control input-sm placeholdesize" id="scode" name="scode" form="master_form" placeholder="State Code" required >
												</div>
											</div>
										</div>
										<div class="col-sm-3">
                                    	    <div class="form-group">
											 <label>Address</label>
												<textarea class="form-control input-sm placeholdesize" rows="1" id="address" name="address" form="master_form" placeholder="Address" ></textarea>
                                        	</div>
                                    	</div>
										<div class="col-sm-3">
											<div class="form-group">
											<label>Postoffice</label>
												<input type="text" class="form-control input-sm placeholdesize" id="postoffice" form="master_form" name="postoffice" placeholder="Postoffice" >
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<label>District</label>
												<input type="text" class="form-control input-sm placeholdesize" id="district" name="district" form="master_form" placeholder="District"  >
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>PIN</label>
												<input type="number" style="text-align:right;" min="0" max="999999" maxlength="6" class="form-control input-sm placeholdesize" id="pin" name="pin" placeholder="PIN" form="master_form"  maxlength="6" >
											</div>
										</div>
									
										<div class="col-sm-4">
											<div class="form-group">
											<label>PAN</label>
												<input type="text" class="form-control input-sm placeholdesize" id="pan" name="pan" form="master_form" placeholder="PAN"  >
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
											<label>Aadhar</label>
												<input type="text" class="form-control input-sm placeholdesize" id="aadhar" name="aadhar" form="master_form" placeholder="Aadhar" >
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
											<label>GST No.</label>
												<input type="text" class="form-control input-sm placeholdesize" id="gstno" name="gstno" form="master_form" placeholder="GST No" >
											</div>
										</div>
										<div id="aRow">
											<div class="col-sm-3">
												<div class="form-group">
												<label id="lbl">PF Code</label>
													<input type="text" class="form-control input-sm placeholdesize" id="pfcode" name="pfcode" form="master_form" placeholder="PF Code" >
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
												<label>DOJ</label>
												<div class="input-group date " data-provide="datepicker">
													<input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="doj" name="doj">
													<div class="input-group-addon">
														<span class="fa fa-calender"></span>
													</div>
												</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
												<label>Security Deposit</label>
													<input type="number" style="text-align:right;" class="form-control input-sm placeholdesize" form="master_form" id="security" name="security" placeholder="Security Deposit">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>IF PF Applicable ?</label>
													<select class="form-control input-sm placeholdesize" id="pf" name="pf" required form="master_form">
															<option value="0" selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>IF TDS Applicable ?</label>
													<select class="form-control input-sm placeholdesize" id="tds" name="tds" required form="master_form">
															<option value="0" selected disabled>Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<label>Bank A/c</label>
											<input type="text" class="form-control input-sm placeholdesize" id="bankac" name="bankac" form="master_form" placeholder="Bank A/c" >
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<label>Bank Name</label>
											<input type="text" class="form-control input-sm placeholdesize" id="bankname" name="bankname" form="master_form" placeholder="Bank Name"  >
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<label>Amount(Rs.)</label>
											<input type="number" style="text-align:right;" class="form-control input-sm placeholdesize" id="amount" form="master_form" name="amount" placeholder="Amount(Rs.)" >
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label>IFSC</label>
												<input type="text" form="master_form" class="form-control input-sm placeholdesize" id="ifsc" name="ifsc" placeholder="IFSC" >
											</div>
										</div>
										<div id="form">
											<div id="secondform" style="margin-top:0px;border-bottom:2px solid;width:100%;">
												<b>Opening Balance</b>
											</div>
											<br>
											<form id="opeBalance" name="opeBalance"></form>
											<table id="file_info" class="table table-striped" width="100%" cellspacing="0">
                                        	<thead>
												<input type="hidden" id="row" value="0">
												<tr>
                                           			<th><font style="font-weight:bold">Batch </font></th>
													<th><font style="font-weight:bold">Tobacco </font></th> 
													<th><font style="font-weight:bold">Leaves </font></th> 
													<th><font style="font-weight:bold">Black Yarn </font></th> 
													<th><font style="font-weight:bold">White Yarn </font></th> 
													<th><font style="font-weight:bold">Filter </font></th>
													<th><font style="font-weight:bold">Action </font></th>
												</tr>
												<tr>
                                                    <td style="text-align:right;">
                                                    <input type="hidden" id="ids"/>
														<input type="hidden" id="batchname"/>
														<select id="batch" name="batch" class="form-control input-sm placeholdesize batch" form="opeBalance"  >
														</select>
													</td> 
                                            		<td style="text-align:right;">
														<input type="text" class="form-control input-sm placeholdesize" id="tobacco" value="0" name="tobacco" placeholder="Tobacco" form="opeBalance" ><span id="errmsgT"></span> 
													</td> 
                		                            <td style="text-align:right;">
														<input type="text" class="form-control input-sm placeholdesize" id="leaves" name="leaves" value="0"  placeholder="Leaves" form="opeBalance" ><span id="errmsgL"></span>
													</td> 
                                        		    <td style="text-align:right;">
														<input type="text" class="form-control input-sm placeholdesize" id="blackYarn" name="Black Yarn"  value="0" form="opeBalance" placeholder="Black Yarn" ><span id="errmsgBY"></span>
													</td> 
                                            		<td style="text-align:right;">
														<input type="number" class="form-control input-sm placeholdesize" id="whiteyarn" name="whiteyarn" value="0"  form="opeBalance" placeholder="White Yarn" ><span id="errmsgWY"></span>
													</td> 
        		                                    <td style="text-align:right;">
														<input type="text" class="form-control input-sm placeholdesize" id="filter" name="filter" value="0"  placeholder="Filter" form="opeBalance" ><span id="errmsgF"></span>
													</td> 
                                		            <td style="text-align:right;"> 
														<button type="button" form="opeBalance" id="add" class="btn btn-primary btn-xs pull-left"><i class="fa fa-plus"></i></button>
													</td> 
												</tr>
										   	</thead>
                    	                   	<tbody id="file_infobody">
                                        	</tbody>
                                    	</table>
									</div>
									<div class="col-lg-12" >
										<input type="hidden"  id="save_update" value="" ><input type="hidden"  id="saveupdate" value="" >
										&nbsp;	&nbsp;	<!--<button type="button" class="btn btn-sm btn-danger pull-left delete_data" >Delete</button>-->
										&nbsp;	&nbsp;	<button type="submit" id="save" form="master_form" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
										&nbsp;	&nbsp;	<button type="button"  class="btn btn-sm btn-info pull-right closehideshow" >Close</button>
									</div>
									</form>
									</div>
									<br/>
									<div class="col-lg-12 ">
										<div class="table-responsive" id="show_master">
											
										</div>
									</div>
                                    
                                    

								</div><!-- /panel body -->
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
                                <h4 class="modal-title">Choose Date</h4>
                                </div>
                                <div class="modal-body" style="width:50%">
                                    <div class="input-group date " data-provide="datepicker">
                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj" id="doj1" name="doj1">
                                        <div class="input-group-addon">
                                            <span class="fa fa-calender"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
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
	<script src="<?php echo base_url(); ?>assets/js/myjs/PartyMaster.js"></script>
 
<script>
$('#doj').datepicker({
           'todayHighlight':true,
           format: 'yyyy-mm-dd',
           autoclose: true,
       });
       $('#doj1').datepicker({
           'todayHighlight':true,
           format: 'yyyy-mm-dd',
            autoclose: true,
       });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
       $("#doj").val(date);
       $("#doj1").val(date);
	  // alert(date);
	   
</script>

    
  </body>
</html>
