 <?php
//print_r($sales_texdata);
//include 'fpdf.php';
//include 'exfpdf.php';
//include 'easyTable.php';

/*$cells=array('Lorem ipsum dolor', 
'Consectetur adipiscing elit. Nam quis tincidunt mi', 
'Vitae pulvinar tortor. Integer quis mattis lorem. Quisque maximus ut ipsum aliquet mattis.', 
'Sed in tristique enim. Vivamus malesuada, sapien non consequat tempus, risus mauris ornare risus, in varius urna est quis enim.', 
'Suspendisse nec fermentum orci, ut feugiat felis.', 
'Phasellus molestie urna nisi, nec
imperdiet orci pretium vel. Donec vehicula tellus nisl, nec commodo diam posuere eu.',
'Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc in libero non velit consectetur facilisis tincidunt non justo.',
'Pellentesque', 'Scelerisque nec nibh a sollicitudin.', 'Nullam porttitor nulla est, nec semper felis mattis sit amet.',
'Donec', 'fringilla congue felis, ornare', 'tempus velit congue at.', 
'Curabitur euismod, urna ut pretium sodales',
'felis ligula tincidunt tellus, a vestibulum urna velit ac odio.',
'In non est et arcu sollicitudin', 
'Faucibus et in metus. Proin consequat dictum aliquam. Fusce sodales, nisl sit amet ornare porta', 
'velit odio ultricies quam', 'ut accumsan massa enim a tortor', 
'Sed euismod est eu laoreet blandit.',
'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
'Donec eget enim egestas, pulvinar nulla non, mollis risus. In id ipsum ex. Morbi laoreet dui feugiat enim dapibus rhoncus. Curabitur mollis velit accumsan ex suscipit fringilla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur quis fermentum nibh. Aenean eget tellus eu ligula hendrerit dapibus vitae at leo. Vivamus at ligula non purus iaculis eleifend. Integer eget risus non dui scelerisque consectetur. Quisque et leo ut ex lacinia malesuada dictum vitae diam. Integer eleifend in nibh in mattis. Aenean eu justo quis mauris tempus eleifend. Praesent malesuada turpis ut justo semper tempor. Integer varius, nisi non elementum molestie, leo arcu euismod velit, eu tempor ligula diam convallis sem. Sed ultrices hendrerit suscipit. Pellentesque volutpat a urna nec placerat. Etiam auctor dapibus leo nec ullamcorper. Nullam id placerat elit. Vivamus ut quam a metus tincidunt laoreet sit amet a ligula. Sed rutrum felis ipsum, sit amet finibus magna tincidunt id. Suspendisse vel urna interdum lacus luctus ornare. Curabitur ultricies nunc est, eget rhoncus orci vestibulum eleifend. In in consequat mi. Curabitur sodales magna at consequat molestie. Aliquam vulputate, neque varius maximus imperdiet, nisi orci accumsan risus, sit amet placerat augue ipsum eget elit. Quisque sodales orci non est tincidunt tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In ut diam in dolor ultricies accumsan sit amet eu ex. Pellentesque aliquet scelerisque ullamcorper. Aenean porta enim eget nisl viverra euismod sed non eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at imperdiet sem, non volutpat metus. Phasellus sed velit sed orci iaculis venenatis ac id risus.');*/
           //$data;
         $words2=10;
function getIndianCurrency( $number)
{
    $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_1 ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
   // $points = ($point) ?"." . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
    
   return $result . "Rupees Only";
}

ob_start();
           
           
                $pdf=new exFPDF('P','mm',array(210,297));
                $pdf->AddPage();
                $pdf->SetXY(0,5);

                $pdf->SetFont('helvetica', '', 10);
                $pdf->AddFont('helvetica', '', 'helvetica.php');
                $pdf->AddFont('helvetica', 'B', 'helveticab.php');
                $pdf->AddFont('helvetica', 'I', 'helveticai.php');
                $pdf->AddFont('helvetica', 'BI', 'helveticabi.php');
               


             /*   $pdf->AddPage("p","A4"); 
            $pdf->SetXY(0,5);
            $pdf->SetMargins(5,5,5);
            $pdf->SetAutoPageBreak(false);
			$pdf->SetFont('helvetica','',10);*/
			
			foreach($companydata as $value){

				$companyname=$value->company_name;
				$address=$value->address;
				$email=$value->email;
				$statename=$value->statename;
				$phone=$value->phone;
				$gst=$value->gst;
				$pan=$value->pan;
				$bank=$value->bank;
				$branch=$value->branch;
				$ac_no=$value->ac_no;
				$ifsc=$value->ifsc;
				
			}

				
			foreach($masterdata as $valuem){
                $voucher_date=$valuem['voucher_date'];
                $type=$valuem['type'];
                $bill_no=$valuem['sale_id'];
                $bill_date=$valuem['bill_date'];
                $sgst=$valuem['sgst'];
                $cgst=$valuem['cgst'];
                $igst=$valuem['igst'];
                $total=$valuem['total'];
                $nccd=$valuem['nccd'];
                $truck_no=$valuem['truck_no'];
                $freight=$valuem['freight'];
                $basic=$valuem['basic'];
                $gst_invoice_no=$valuem['gst_invoice_no'];
				$party_name=$valuem['party_name'];
				$address1=$valuem['address'];
				$district=$valuem['district'];
				$pan1=$valuem['pan'];
				$gstno1=$valuem['gstno'];
				$qtysum=$valuem['qtysum'];
				
				$timestamp = strtotime($bill_date);
				$new_date = date("d-m-Y", $timestamp);
				$grandtotal=0;
				$sgstamt=0;
				$cgstamt=0;
				$igstamt=0;
				$grandtotal=$grandtotal+$total;
				if($sgst >0){
					$sgstamt=(($total)*($sgst)/(100));
					$grandtotal=$grandtotal+$sgstamt;
					
				}
				if($cgst >0){
					$cgstamt=(($total)*($cgst)/(100));
					$grandtotal=$grandtotal+$cgstamt;
				}
				if($igst >0){
					$igstamt=(($total)*($igst)/(100));
					$grandtotal=$grandtotal+$igstamt;
				}

				 $basic_amt = (($qtysum) * ($basic));
				 $nccd_amt = (($qtysum) * ($nccd));
			

            }

 
               

				$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
                $table->easyCell("$companyname \n  \n \n\n", 'align:L; colspan:6;font-style:B;font-size:15;  border:LRT;');
               
				$table->easyCell("Invoice No.: $bill_no \n Dated: $new_date", ' align:R; colspan:6; border:RT;font-style:B; font-size:10;');
				 $table->printRow();


				 $table->easyCell("Address : $address \nState : $statename \n PAN No: $pan \n Email Id: $email \n GSTIN No: $gst ", 'align:L;colspan:6; font-style:B; font-size:8; border:LR;');
				 $table->easyCell(" \n  Original for Buyer \n Duplicate for Transporter \n Triplicate for Seller:", ' align:R; colspan:6; border:R;font-style:B; font-size:8;');
				 $table->printRow();
				$table->endTable(0);
				

				$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
                $table->easyCell("BILL TO:", 'align:L; colspan:5;font-style:B;  border:LRT;');
                $table->easyCell("SHIP TO", ' align:L; colspan:4; border:LRT; font-style:B; font-size:10;');
                $table->easyCell("SHIPPING DETAILS", ' align:L; colspan:3; border:RT;font-style:B; font-size:10;');
				$table->printRow();
				
				$table->endTable(0);

				$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:0;');

			    $table->easyCell("Party Name :  $party_name", 'align:L;colspan:5; font-style:B; font-size:8;border:LR ');
                $table->easyCell("Party Name :  $party_name ", ' align:L; colspan:4; font-style:B; font-size:8;');
                $table->easyCell("Vehicle No :   $truck_no", ' align:R; colspan:3; font-style:B; font-size:8;border:LR');
                $table->printRow();

                $table->endTable(0);
                $table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:0;');

                $table->easyCell("Address : $address1", 'align:L;colspan:5; font-style:B; font-size:8;border:LR ');
                $table->easyCell("Address : $address1 ", ' align:L; colspan:4; font-style:B; font-size:8;');
                $table->easyCell("Freight      :   $freight", ' align:R; colspan:3; font-style:B; font-size:8;border:LR');
                $table->printRow();
                
                $table->easyCell("District : $district", 'align:L;colspan:5; font-style:B; font-size:8;border:LR ');
                $table->easyCell("District : $district", ' align:L; colspan:4; font-style:B; font-size:8;');
                $table->easyCell("GST Bill No. : $gst_invoice_no", ' align:R; colspan:3; font-style:B; font-size:8;border:LR');
                $table->printRow();
                
                $table->easyCell("Pan No : $pan1", 'align:L;colspan:5; font-style:B; font-size:8;border:LR ');
                $table->easyCell("Pan No : $pan1", ' align:L; colspan:4; font-style:B; font-size:8;');
                $table->easyCell("Eway-Bill No :", ' align:R; colspan:3; font-style:B; font-size:8;border:LR');
                $table->printRow();
                
                $table->easyCell("Gst No : $gstno1", 'align:L;colspan:5; font-style:B; font-size:8;border:LR ');
                $table->easyCell("Gst No : $gstno1", ' align:L; colspan:4; font-style:B; font-size:8;');
                $table->easyCell("", ' align:R; colspan:3; font-style:B; font-size:8;border:LR');
				$table->printRow();
				
				
				$table->endTable(0);

                $table=new easyTable($pdf, '{12, 44, 24,15, 13, 13, 26, 33}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
                $table->easyCell("TAX INVOICE", 'align:C; colspan:8;font-style:B;  border:LRT;');
               // $table->easyCell("Invoice No.\nDated", ' align:L; colspan:2;border:LT; font-style:B; font-size:10;');
                //$table->easyCell(": \n: ", ' align:L; colspan:4; border:RT;font-style:B; font-size:10;');
                $table->printRow();

                // $table->easyCell("Mobile No : \nGSTIN/UIN : ", 'align:L;colspan:6; font-style:B;  border:LR;');
                // $table->easyCell("", ' align:L; colspan:2;border:L; font-style:B; font-size:10;');
                // $table->easyCell("", ' align:L; colspan:4; border:R;font-style:B; font-size:10;');
                // $table->printRow();
 
                $table->easyCell("S/No", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Description of Goods", 'border:1; align:C; font-size:8;; font-style:B;');
                $table->easyCell("HSN CODE", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Quantity", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Unit", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("No of Box", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Rate", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Taxable value", 'border:1; align:C; font-size:8; font-style:B;');
              	$table->printRow();
			 ; 
			 $sr=1;
			 $num=0;
			 $tot_amt=0;
			 $tot_qty=0;
			 $tot_pack=0;
			
			 $tot_rate=0;
			 $tot_dis=0;
			   foreach($productdata as $row){ 
				   
					   $batch_name= $row->batch_name;
					   $stock= $row->stock;
					   $pack= $row->pack;
					   $qty= $row->qty;
					   $rate= $row->rate;
					    $amt = $qty * $rate;
						$tot_amt=$amt+$tot_amt;
						$tot_qty=$qty+$tot_qty;
						$tot_pack=$tot_pack+$pack;
			   

                $table->easyCell("$sr", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$batch_name", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$qty", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("1000", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$pack", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$rate", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$amt", 'border:LR; align:R; font-size:8; font-style:B;');
				   $table->printRow();
				   
				   $sr=$sr+1;
			   }
            

                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
              
                $table->printRow();

                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("", 'border:LR; align:C; font-size:8; font-style:B;');
                
                $table->printRow();



            
       

        
        $table->easyCell("Total Amount", 'border:LRT; colspan:3; align:R; font-size:10; font-style:B;');
        $table->easyCell("$tot_qty", 'border:LRT; align:R; font-size:8; font-style:B;');
        $table->easyCell("", 'border:LRT;  align:R; font-size:8; font-style:B;');
        $table->easyCell("$tot_pack", 'border:LRT; align:R; font-size:8; font-style:B;');
        $table->easyCell("", 'border:LRT; align:R; font-size:8; font-style:B;');
        $table->easyCell("$tot_amt", 'border:LRT; align:R; font-size:8; font-style:B;');
        $table->easyCell("", 'border:LRT; align:R; font-size:8; font-style:B;');
        $table->easyCell("", 'border:LRT; align:C; font-size:8; font-style:B;');
        
		$table->printRow();
		
	
		
		

        $table->easyCell("", 'border:1; colspan:12; align:R; font-size:8; font-style:B;');
        $table->printRow();
		$table->endTable(0);
		
		

                           

        $table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
        $table->easyCell("Amount in Words", 'border:LR;  align:L; colspan:3; font-size:12; font-style:B;');
        $table->easyCell("Summary", 'border:LRB; align:C; font-size:8; font-style:B;');
        $table->easyCell("@", 'border:LRB; align:C; font-size:8; font-style:B;');
        $table->easyCell("", 'border:LRB; align:C; font-size:8; font-style:B;');
      
      
        $table->printRow();

		$add=getIndianCurrency($grandtotal);


      
        $table->easyCell("$add", 'border:LR; align:L;colspan:3; font-size:8; font-style:B;');
        $table->easyCell("IGST", 'border:LR;  align:C; font-size:8; font-style:B;');
        $table->easyCell("28%", 'border:L; align:C; font-size:8; font-style:B;');
        $table->easyCell("$igstamt", 'border:LR; align:R; font-size:8; font-style:B;');
		  $table->printRow();
		  
		  $table->easyCell("", 'border:L; align:L;colspan:3; font-size:8; font-style:B;');
		  $table->easyCell("SGST", 'border:LR;  align:C; font-size:8; font-style:B;');
		  $table->easyCell("14%", 'border:L; align:C; font-size:8; font-style:B;');
		  $table->easyCell("$sgstamt", 'border:LR; align:R; font-size:8; font-style:B;');
			$table->printRow();

			$table->easyCell("", 'border:L; align:L;colspan:3; font-size:8; font-style:B;');
			$table->easyCell("CGST", 'border:LR;  align:C; font-size:8; font-style:B;');
			$table->easyCell("14%", 'border:L; align:C; font-size:8; font-style:B;');
			$table->easyCell("$cgstamt", 'border:LR; align:R; font-size:8; font-style:B;');
			  $table->printRow();

			  $table->easyCell("", 'border:L; align:L;colspan:3; font-size:8; font-style:B;');
			  $table->easyCell("Total", 'border:LRT;  align:C;colspan:2; font-size:10; font-style:B;');
			  $table->easyCell("$grandtotal", 'border:LRT; align:R; font-size:8; font-style:B;');
				$table->printRow();


			  $table->easyCell("", 'border:LRT; align:L;colspan:3; font-size:8; font-style:B;');
			  $table->easyCell("Basic Duty", 'border:LRT;  align:C; font-size:8; font-style:B;');
			  $table->easyCell("0.05", 'border:LT; align:C; font-size:8; font-style:B;');
			  $table->easyCell("$basic_amt", 'border:LRT; align:R; font-size:8; font-style:B;');
				$table->printRow();
				

				$table->easyCell("", 'border:LR; align:L;colspan:3; font-size:8; font-style:B;');
				$table->easyCell("NCCD", 'border:LR;  align:C; font-size:8; font-style:B;');
				$table->easyCell("1.00", 'border:L; align:C; font-size:8; font-style:B;');
				$table->easyCell("$nccd_amt", 'border:LR; align:R; font-size:8; font-style:B;');
				$table->printRow();
				  

			 
        $table->endTable(0);


        

        $table=new easyTable($pdf, '{36,36,36, 36,36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
        $table->easyCell("Terms & Conditions", 'border:LRT;colspan:3; align:L; font-size:10; font-style:BU;');
       
        $table->easyCell("$companyname", 'border:LRT; colspan:2; align:R; font-size:10; font-style:B;');
        $table->printRow();

       

        $table->easyCell("Bill Amount is Payable Immediately after presentation otherwise Interest at the Rate of 12% will be charged \n All disputes are subjected to name of CITY Juridiction only.\n E. & O. E.", 'border:LRT;colspan:3; align:L; font-size:8;');
      
        
        $table->easyCell("", 'border:R;padding-top:5px; align:R; font-size:10;colspan:2; font-style:B;');
		$table->printRow();

		$table->easyCell("", 'border:LRB;colspan:3; align:L; font-size:8;');
      
        
        $table->easyCell("Authorised Signatory", 'border:RB;padding-top:5px; align:R; font-size:10;colspan:2; font-style:B;');
		$table->printRow();
		
		
        $table->endTable(10);


			  
        $pdf->Output(); 
	
    

?>
