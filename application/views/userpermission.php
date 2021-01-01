<!DOCTYPE html>
<?php
	$title = '';
	$title1 = '';
if(isset($title_name)){
	$title = $title_name;
	$title1 = $title_name1;
}
?>
<style> 
        .main { 
            display: block; 
            position: relative; 
            padding-left: 45px; 
            margin-bottom: 15px; 
            cursor: pointer; 
            font-size: 20px; 
        } 
          
        /* Hide the default checkbox */ 
        input[type=checkbox] { 
            visibility: hidden; 
        } 
          
        /* Creating a custom checkbox 
        based on demand */ 
        .geekmark { 
            position: absolute; 
            top: 0; 
            left: 0; 
            height: 20px; 
            width: 20px; 
            background-color: black; 
        } 
          
        /* Specify the background color to be 
        shown when hovering over checkbox */ 
        .main:hover input ~ .geekmark { 
            background-color: yellow; 
        } 
          
        /* Specify the background color to be 
        shown when checkbox is active */ 
        .main input:active ~ .geekmark { 
            background-color: red; 
        } 
          
        /* Specify the background color to be 
        shown when checkbox is checked */ 
        .main input:checked ~ .geekmark { 
            background-color: green; 
        } 
          
        /* Checkmark to be shown in checkbox */ 
        /* It is not be shown when not checked */ 
        .geekmark:after { 
            content: ""; 
            position: absolute; 
            display: none; 
        } 
          
        /* Display checkmark when checked */ 
        .main input:checked ~ .geekmark:after { 
            display: block; 
        } 
          
        /* Styling the checkmark using webkit */ 
        /* Rotated the rectangle by 45 degree and  
        showing only two border to make it look 
        like a tickmark */ 
        .main .geekmark:after { 
            left: 8px; 
            bottom: 5px; 
            width: 6px; 
            height: 12px; 
            border: solid white; 
            border-width: 0 4px 4px 0; 
            -webkit-transform: rotate(45deg); 
            -ms-transform: rotate(45deg); 
            transform: rotate(45deg); 
        } 
    </style> 
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
					<style>
						.checkbox {
    width: 100%;
    margin: 15px auto;
    position: relative;
    display: block;
}

.checkbox input[type="checkbox"] {
    width: auto;
    opacity: 0.00000001;
    position: absolute;
    left: 0;
    margin-left: -20px;
}
.checkbox label {
    position: relative;
}
.checkbox label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    margin: 4px;
    width: 22px;
    height: 22px;
    transition: transform 0.28s ease;
    border-radius: 3px;
    border: 2px solid #7bbe72;
}
.checkbox label:after {
  content: '';
    display: block;
    width: 10px;
    height: 5px;
    border-bottom: 2px solid #7bbe72;
    border-left: 2px solid #7bbe72;
    -webkit-transform: rotate(-45deg) scale(0);
    transform: rotate(-45deg) scale(0);
    transition: transform ease 0.25s;
    will-change: transform;
    position: absolute;
    top: 12px;
    left: 10px;
}
.checkbox input[type="checkbox"]:checked ~ label::before {
    color: #7bbe72;
}

.checkbox input[type="checkbox"]:checked ~ label::after {
    -webkit-transform: rotate(-45deg) scale(1);
    transform: rotate(-45deg) scale(1);
}

.checkbox label {
    min-height: 34px;
    display: block;
    padding-left: 40px;
    margin-bottom: 0;
    font-weight: normal;
    cursor: pointer;
    vertical-align: sub;
}
.checkbox label span {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}
.checkbox input[type="checkbox"]:focus + label::before {
    outline: 0;
}
input[type=checkbox]:checked {
  background-color: #a77e2d !important;
  color: #ffffff !important;
}
					</style>  

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
								<form id="master_form" name="vendors_form">
									<div class="col-sm-12" >
									
										<div class="col-sm-3">
                                                    <label>Select Role*</label>
                                                </div>
                                                <div class="col-sm-3">
													<input type="checkbox">
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option value="" selected>Select</option>
                                                        <option value="Admin">Admin</option>
                                                        
                                                    </select>
												</div>
												
											<br>
										<div class="form-group row" id="tblmenu" style="display:none;">

                                                <table class="table table_striped">
                                                    <thead>
                                                        <tr>
                                                            <th> Menu Name</th>
                                                            <th style="width:20%"><label class="main"><input type="checkbox" id="alladdchk"
                                                                 class="allchkcheck"   name="select_all_create" value="0"> <span class="geekmark"></span></label> <label style="margin-left:15%;">Create</label></th>
                                                            <th  style="width:20%"><label class="main"><input type="checkbox" id="allreadchk"
															class="allchkcheck"  name="select_all_read" value="0"> <span class="geekmark"></span></label><label style="margin-left:15%;"> Read</label></th>
                                                            <th  style="width:20%"><label class="main"><input type="checkbox" id="alledit"
															class="allchkcheck"   name="select_all_update" value="0"> <span class="geekmark"></span></label> <label style="margin-left:15%;">Update</label></th>
                                                            <th  style="width:20%"><label class="main"><input type="checkbox" id="alldelete"
															class="allchkcheck"   name="select_all_delete" value="0"> <span class="geekmark"></span></label><label style="margin-left:15%;"> Delete</label></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbd_user_rights">

                                                    </tbody>
                                                </table>
                                            </div>
									
										<div class="form-group row" >
										<input type="hidden" id="save_update" value=""	/>
											
											&nbsp;	&nbsp;	<button type="submit" class="btn btn-sm btn-success btn-sm pull-right">Save</button>
										
										</div>
									</div>
										

						<div class="col-lg-12" >
							
						</div>

								</form>
					</div>
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
    <?php include "includes/footerlink.php"; ?>   
    <script src="<?php echo base_url(); ?>assets/js/myjs/userpermission.js"></script>
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
