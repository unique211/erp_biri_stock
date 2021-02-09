<!DOCTYPE html>
<style>
	.clr1 {
		background-color: lightblue;
	}

	.clr2 {
		background-color: #93C158;
	}

	.clr3 {
		background-color: #D4E882;
	}
</style>
<?php
$title = '';
$title1 = '';
if (isset($title_name)) {
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
	  
	  if(($val->menu_id==5 && $val->submenu_id==30) && ( $val->create_p==1 || $val->delete_p==1 || $val->edit_p==1 || $val->read_p	==1 ||  $val->export_p	==1)){

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
		.names {
			font-weight: bold;
		}
	</style>
</head>

<body class="overflow-hidden">
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
										<div class="col-sm-2">
											<div class="form-group">
												<label>Period</label>


											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select id="monthnm" name="monthnm" class="form-control monthdata">
													<option selected disabled>Select</option>
													<option value="1">January</option>
													<option value="2">Febuary</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<select id="yearnm" name="yearnm" class="form-control monthdata">
													<option selected disabled>Select</option>
													

												</select>
											</div>
										</div>

									</div><br>

								<?php } ?>

									<!-- <div class="col-sm-12">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3" style="margin-left:3%;">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-info" id="search" name="search">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3" style="float:right;">
                                            <div class="form-group">
                                                <label></label>
                                                <div class="form">
                                                    <input type="button" id="btnExport" class="btn btn-primary pull-right" value="Export" />
                                                </div>
                                            </div>
                                        </div>
                                    </div><br> -->
									<div class="col-sm-12">
										<div class="table-responsive">
											<table id="dataTable" class="table table-striped table-bordered">

												<!-- <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;"> -->
												<thead id="thead">
													<tr>
														<th>HSN CODE</th>
														<th style="text-align:center;"><b>
																<font color="black">Opening Balance</font>
															</b></th>
														<!--  <th width="5%" rowspan="2">Time</th> -->
														<th style="text-align:center;"><b>
																<font color="black"> Manufacturing</font>
															</b> </th>
														<th style="text-align:center;"><b>
																<font color="black">Clearence</font>
															</b></th>
														<th style="text-align:center;"><b>
																<font color="black">Closing Balance</font>
															</b></th>
														<th style="text-align:center;"><b>
																<font color="black">Value of Goods</font>
															</b></th>


													</tr>

												</thead>
												<tbody id="tbody">
													<tr>
													<td id="hsncode" ></td>
														<td style="text-align:right;" id="openingbal"></td>
														<td style="text-align:right;" id="manufacturing"></td>
														
														<td style="text-align:right;" id="clearence"></td>
														<td  style="text-align:right;" id="closeingbal"></td>
														<td style="text-align:right;" id="valueofgood"></td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>

													</tr>
												</tbody>
												<tfoot id="tfootid">
													<!-- <tr>
                                                        <td>2019-20</td>
                                                        <td colspan="2"><b>48896.870</b></td>
                                                        <td colspan="2"><b>136315.000</b></td>
                                                        <td colspan="2"><b>59707.375</b></td>
                                                        <td colspan="2"><b>18316.000</b></td>
                                                        <td colspan="2"><b>294.000</b></td>
                                                        <td colspan="2"><b>106894.495</b></td>
                                                    </tr>-->
												</tfoot>
											</table>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="col-sm-6">
											<div style="margin-top:0px;border-bottom:1px solid;width:100%;">
												<label class=""><b>Payment of Duty</b></label>
												</div>
												<table id="paymentdataTable" class="table table-striped table-bordered">

													<!-- <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;"> -->
													<thead id="thead">
														<tr>
															<th></th>
															<th style="text-align:center;"><b>
																	<font color="black">Rate</font>
																</b></th>
															<!--  <th width="5%" rowspan="2">Time</th> -->
															<th style="text-align:center;"><b>
																	<font color="black"> Amount</font>
																</b> </th>



														</tr>

													</thead>
													<tbody id="paymenttbody">
														<tr>
															<td>Basic</td>
															<td style="text-align:right;" id="basicamt1"></td>
															<td style="text-align:right;" id="basicamt"></td>


														</tr>
														
														<tr>
															<td>NCCD</td>
															<td style="text-align:right;" id="nccdamt1"></td>
															<td style="text-align:right;" id="nccdamt"></td>
														</tr>
														<tr>
															<td>Cess</td>
															<td style="text-align:right;" id="chessamt1"></td>
															<td style="text-align:right;" id="chessamt"></td>
														</tr>
													</tbody>
													<tfoot id="tfootid">
													<tr>
															<td>Total</td>
															<td  style="text-align:right;"  id="totalamt"></td>
															<td  style="text-align:right;"  id="totalamt1"></td>
														</tr>
													</tfoot>
												</table>
											
										</div>



										<div class="col-sm-6">
											<div style="margin-top:0px;border-bottom:1px solid;width:100%;">
												<label class=""><b>PLA</b></label>
											</div>
											<table id="pladataTable" class="table table-striped table-bordered">

													<!-- <table id="file_info" class="table table-striped dataTable" cellspacing="0" style="width:100%;"> -->
													<thead id="thead">
														<tr>
															<th></th>
															<th style="text-align:center;"><b>
																	<font color="black">Rate</font>
																</b></th>
															<!--  <th width="5%" rowspan="2">Time</th> -->
															<th style="text-align:center;"><b>
																	<font color="black"> Amount</font>
																</b> </th>



														</tr>

													</thead>
													<tbody id="platbody">
														<tr>
															<td>Opening Balance</td>
															<td></td>
															<td>0.00</td>


														</tr>
														
														<tr>
															<td>Deposit</td>
															<td></td>
															<td>0.00</td>
														</tr>
														<tr>
															<td>Total</td>
															<td></td>
															<td>0.00</td>
														</tr>
														<tr>
															<td>Debit (Duty)</td>
															<td></td>
															<td>0.00</td>
														</tr>
														<tr>
															<td>Debit (Others)</td>
															<td></td>
															<td>0.00</td>
														</tr>
														<tr>
															<td>Closing Balance</td>
															<td></td>
															<td>0.00</td>
														</tr>
													</tbody>
													<tfoot id="footid">
													
													</tfoot>
												</table>

										</div>
										<div class="col-sm-12" id="show_master">
										
										<!-- <div style="margin-top:0px;border-bottom:1px solid;width:100%;">
												<label class=""><b>Invoice Issue</b></label>
											</div>
											<br>
											<br>
										<div class="col-sm-2">
											<div class="form-group">
												<label>From</label>


											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="fdate" name="fdate">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
												<label>To</label>


											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<div class="input-group date " data-provide="datepicker">
                                                        <input type="text" class="form-control input-sm placeholdesize datepicker doj"  id="tdate" name="tdate">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-calender"></span>
                                                        </div>
                                                    </div>
											</div>
										</div> -->

									</div><br>


									</div>
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
	<script type="text/javascript">
		var baseurl = "<?php print base_url(); ?>";
	</script>
	<script>
	var editrt="<?php  echo $edit_p; ?>";
var delrt="<?php  echo $delete_p; ?>";
var read_p="<?php  echo $read_p; ?>";
var create_p="<?php  echo $create_p; ?>";
var export_p="<?php  echo $export_p; ?>";

	</script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/myjs/centrealwiseex.js"></script>
	<script>
		$('#date #fdate').datepicker({
			'todayHighlight': true,
			format: 'yyyy-mm-dd',
			autoclose: true,
		});

		var date = new Date();
		// var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
		// lastDay = lastDay.toString('dd/MM/yyyy');
		//
		date = date.toString('dd/MM/yyyy');

		$("#tdate").val(date);
		$("#fdate").val(date);

		$('#fdate').datepicker().on('changeDate', function (ev) {
    $('#fdate').Close();
});
		// $("#fdate").val();
	</script>
</body>

</html>
