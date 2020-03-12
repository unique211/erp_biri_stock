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
										<div class="col-sm-3">
										<div class="form-group">
                                                
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-info" id="search" name="search">
                                                </div>
                                            </div>
										</div>

									</div><br>



									<!-- <div class="col-sm-12">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-3" style="margin-left:3%;">
                                           
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
														<th style="text-align:center;">Sl. No.</th>
														<th style="text-align:center;"><b>
																<font color="black">Bank IFSC</font>
															</b></th>
														<!--  <th width="5%" rowspan="2">Time</th> -->
														<th style="text-align:center;"><b>
																<font color="black"> Bank account Number</font>
															</b> </th>
														<th style="text-align:center;"><b>
																<font color="black">Name of contractor</font>
															</b></th>
														<th style="text-align:center;"><b>
																<font color="black">Account Final Y/N</font>
															</b></th>
														<th style="text-align:center;"><b>
																<font color="black">Amount Actual</font>
															</b></th>
															<th style="text-align:center;"><b>
																<font color="black">Amount in Thousand</font>
															</b></th>


													</tr>

												</thead>
												<tbody id="tbody">
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>
														

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>0.00</td>
														<td>0.00</td>

													</tr>

												</tbody>
												<tfoot id="tfootid">
												<tr class="names">
														<td class="texes"></td>
														<td class="texes"></td>
														<td class="texes"></td>
														<td class="texes"></td>
														<td class="texes"></td>
														<td class="texes">0.00</td>
														<td class="texes">0.00</td>

													</tr>
												</tfoot>
											</table>
										</div>
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
	<script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/myjs/itemwisestockmonthly.js"></script>
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
		// $("#fdate").val();
	</script>
</body>

</html>
