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

//$pdf=new exFPDF('P','mm',array(140,130));
$pdf=new exFPDF('P','mm',array(210,297));
$pdf->AddPage();
$pdf->SetXY(0,5);

$pdf->SetFont('helvetica', '', 10);
$pdf->AddFont('helvetica', '', 'helvetica.php');
$pdf->AddFont('helvetica', 'B', 'helveticab.php');
$pdf->AddFont('helvetica', 'I', 'helveticai.php');
$pdf->AddFont('helvetica', 'BI', 'helveticabi.php');


$i=0;  
foreach($masterdata as $value ){
 
	$address=$value['address'];
	$district=$value['district'];
	$pin=$value['pin'];
	$name=$value['name'];
	$netbiri=$value['netbiri'];
	$wages=$value['wages'];
	$bonus=$value['bonus'];
	$handlingcharges=$value['handlingcharges'];
	$wagesd=$value['wagesd'];
	$bonusd=$value['bonusd'];
	$handlingd=$value['handlingd'];
	$reateper=number_format($wagesd+$bonusd+$handlingd,2);
        $total=round($value['totalg']);
		$i=$i+1; 
               
		$j=0;
		$k=0;

             /*   $pdf->AddPage("p","A4"); 
            $pdf->SetXY(0,5);
            $pdf->SetMargins(5,5,5);
            $pdf->SetAutoPageBreak(false);
			$pdf->SetFont('helvetica','',10);*/

			foreach($companydata as $value){

				$companyname=$value->company_name;
				$address1=$value->address;
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
			
			
			

				$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:0;');
                $table->easyCell("Bill \n  $name  \n$address,$district,$pin", 'align:C; colspan:12;font-style:B;font-size:10;  border:LRT;');
               
				 $table->printRow();


				
				$table->endTable(0);
				

				$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
                $table->easyCell("To \n $companyname \n $address1 \n $statename", 'align:L; colspan:6;font-style:B;  border:LRT;');
                $table->easyCell(" \n Bill No. : $billno \n Date : $todate1  \n Month : $month", 'align:L; colspan:6;font-style:B;  border:LRT;');
				$table->printRow();
				
				$table->endTable(0);

			

                $table=new easyTable($pdf, '{12, 69,33, 33, 33}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
            //     $table->easyCell("", 'align:C; colspan:6;font-style:B;  border:LRT;');
            //    // $table->easyCell("Invoice No.\nDated", ' align:L; colspan:2;border:LT; font-style:B; font-size:10;');
            //     //$table->easyCell(": \n: ", ' align:L; colspan:4; border:RT;font-style:B; font-size:10;');
            //     $table->printRow();

                // $table->easyCell("Mobile No : \nGSTIN/UIN : ", 'align:L;colspan:6; font-style:B;  border:LR;');
                // $table->easyCell("", ' align:L; colspan:2;border:L; font-style:B; font-size:10;');
                // $table->easyCell("", ' align:L; colspan:4; border:R;font-style:B; font-size:10;');
                // $table->printRow();
 
                $table->easyCell("S/No", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Particulars", 'border:1; align:C; font-size:8;; font-style:B;');
                $table->easyCell("Quantity in 1000 Pcs", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Rate per 1000 Pcs", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Amount RS.", 'border:1; align:C; font-size:8; font-style:B;');
              
              	$table->printRow();
			 
				  foreach($getconitem as $value1){
					$j=$j+1;
					$name11=$value1->name;;
					if($j==1){

                $table->easyCell("1.", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("$netbiri", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$wagesd", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$wages", 'border:LR; align:R; font-size:8; font-style:B;');
              
             
				   $table->printRow();
					}
					if($j==2){
				   $table->easyCell("2.", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("$netbiri", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$bonusd", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$bonus", 'border:LR; align:R; font-size:8; font-style:B;');
              
             
				   $table->printRow();
					}


					if($j==3){

				   $table->easyCell("3.", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("$netbiri", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$handlingd", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$handlingcharges", 'border:LR; align:R; font-size:8; font-style:B;');
              
             
				   $table->printRow();
				}
				if($j==4){
					$table->easyCell("4.", 'border:LR; align:C; font-size:8; font-style:B;');
					$table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
					$table->easyCell("0", 'border:LR; align:C; font-size:8; font-style:B;');
					$table->easyCell("0", 'border:LR; align:R; font-size:8; font-style:B;');
					$table->easyCell("0", 'border:LR; align:R; font-size:8; font-style:B;');
					$table->printRow();
				}
				   
				
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



            
       

        
        $table->easyCell("Total Amount", 'border:LRTB; colspan:2; align:R; font-size:10; font-style:B;');
        $table->easyCell("", 'border:LRTB; align:R; font-size:8; font-style:B;');
        $table->easyCell("$reateper", 'border:LRTB;  align:R; font-size:8; font-style:B;');
        $table->easyCell("$total", 'border:LRTB; align:R; font-size:8; font-style:B;');
       
        
		$table->printRow();
		
	
		
		

        
		$table->endTable(0);
		
		

                           
		$add=getIndianCurrency($total);
        $table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
		$table->easyCell("", 'border:L;align:L; colspan:5; font-size:12; font-style:B;');
		$table->easyCell("E & O.E.", 'border:R;align:L; colspan:5; font-size:12; font-style:B;');
      
        $table->printRow();

		
		$table->easyCell("($add)", 'border:LR;  align:L; colspan:6; font-size:10; font-style:B;');
       
      
		$table->printRow();

		$table->endTable(0);
		$table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
		$table->easyCell("", 'border:LB;align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("Signature of Contractor", 'border:RB;align:L; colspan:2; font-size:10; font-style:B;');
      
        $table->printRow();
		
	
		


      
		$table->endTable(0);

			
		$table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
	
		
		$table->easyCell("", 'align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("", 'align:L; colspan:2; font-size:10; font-style:B;');
      
		$table->printRow();
		

		$table->easyCell("", 'align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("", 'align:L; colspan:2; font-size:10; font-style:B;');
      
		$table->printRow();
		
		$table->easyCell("", 'align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("", 'align:L; colspan:2; font-size:10; font-style:B;');
      
		$table->printRow();

		$table->easyCell("", 'align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("", 'align:L; colspan:2; font-size:10; font-style:B;');
      
		$table->printRow();
		
	

		
	

		$table->endTable(0);

		$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:0;');
                $table->easyCell("Bill \n  $name  \n$address,$district,$pin", 'align:C; colspan:12;font-style:B;font-size:10;  border:LRT;');
               
				 $table->printRow();


				
				$table->endTable(0);
				

				$table=new easyTable($pdf, '{10, 37, 12, 12, 12,12, 13, 13, 13, 13, 13, 20}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
                $table->easyCell("To \n $companyname \n $address1 \n $statename", 'align:L; colspan:6;font-style:B;  border:LRT;');
                $table->easyCell(" \n Bill No. : $billno \n Date : $todate1  \n Month : $month", 'align:L; colspan:6;font-style:B;  border:LRT;');
				$table->printRow();
				
				$table->endTable(0);

			

                $table=new easyTable($pdf, '{12, 69,33, 33, 33}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
            //     $table->easyCell("", 'align:C; colspan:6;font-style:B;  border:LRT;');
            //    // $table->easyCell("Invoice No.\nDated", ' align:L; colspan:2;border:LT; font-style:B; font-size:10;');
            //     //$table->easyCell(": \n: ", ' align:L; colspan:4; border:RT;font-style:B; font-size:10;');
            //     $table->printRow();

                // $table->easyCell("Mobile No : \nGSTIN/UIN : ", 'align:L;colspan:6; font-style:B;  border:LR;');
                // $table->easyCell("", ' align:L; colspan:2;border:L; font-style:B; font-size:10;');
                // $table->easyCell("", ' align:L; colspan:4; border:R;font-style:B; font-size:10;');
                // $table->printRow();
 
                $table->easyCell("S/No", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Particulars", 'border:1; align:C; font-size:8;; font-style:B;');
                $table->easyCell("Quantity in 1000 Pcs", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Rate per 1000 Pcs", 'border:1; align:C; font-size:8; font-style:B;');
                $table->easyCell("Amount RS.", 'border:1; align:C; font-size:8; font-style:B;');
              
              	$table->printRow();
			 
				  foreach($getconitem as $value2){
					$k=$k+1;
					$name11=$value2->name;;
					if($k==1){

                $table->easyCell("1.", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("$netbiri", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$wagesd", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$wages", 'border:LR; align:R; font-size:8; font-style:B;');
              
             
				   $table->printRow();
					}
					if($k==2){
				   $table->easyCell("2.", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("$netbiri", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$bonusd", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$bonus", 'border:LR; align:R; font-size:8; font-style:B;');
              
             
				   $table->printRow();
					}


					if($k==3){

				   $table->easyCell("3.", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
                $table->easyCell("$netbiri", 'border:LR; align:C; font-size:8; font-style:B;');
                $table->easyCell("$handlingd", 'border:LR; align:R; font-size:8; font-style:B;');
                $table->easyCell("$handlingcharges", 'border:LR; align:R; font-size:8; font-style:B;');
              
             
				   $table->printRow();
				}
				if($k==4){
					$table->easyCell("4.", 'border:LR; align:C; font-size:8; font-style:B;');
					$table->easyCell("$name11", 'border:LR; align:L; font-size:8; font-style:B;');
					$table->easyCell("0", 'border:LR; align:C; font-size:8; font-style:B;');
					$table->easyCell("0", 'border:LR; align:R; font-size:8; font-style:B;');
					$table->easyCell("0", 'border:LR; align:R; font-size:8; font-style:B;');
					$table->printRow();
				}
				   
				
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



            
       

        
        $table->easyCell("Total Amount", 'border:LRTB; colspan:2; align:R; font-size:10; font-style:B;');
        $table->easyCell("", 'border:LRTB; align:R; font-size:8; font-style:B;');
        $table->easyCell("$reateper", 'border:LRTB;  align:R; font-size:8; font-style:B;');
        $table->easyCell("$total", 'border:LRTB; align:R; font-size:8; font-style:B;');
       
        
		$table->printRow();
		
	
		
		

        
		$table->endTable(0);
		
		

                           
		$add=getIndianCurrency($total);
        $table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
		$table->easyCell("", 'border:L;align:L; colspan:5; font-size:12; font-style:B;');
		$table->easyCell("E & O.E.", 'border:R;align:L; colspan:5; font-size:12; font-style:B;');
      
        $table->printRow();

		
		$table->easyCell("($add)", 'border:LR;  align:L; colspan:6; font-size:10; font-style:B;');
       
      
		$table->printRow();

		$table->endTable(0);
		$table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
		$table->easyCell("", 'border:LB;align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("Signature of Contractor", 'border:RB;align:L; colspan:2; font-size:10; font-style:B;');
      
        $table->printRow();
		
	
		


      
		$table->endTable(0);
		
		
			
			

				$table=new easyTable($pdf, '{36, 36, 36, 26,10, 36}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');
		$table->easyCell("", 'align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("", 'align:L; colspan:2; font-size:10; font-style:B;');
      
		$table->printRow();
		
		$table->easyCell("", 'align:L; colspan:4; font-size:12; font-style:B;');
		$table->easyCell("", 'align:L; colspan:2; font-size:10; font-style:B;');
      
		$table->printRow();
	
	

		
		$table->endTable(0);		
			
     
				}
				$pdf->Output(); 

?>
