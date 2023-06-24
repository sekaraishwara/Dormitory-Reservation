<?php
require('fpdf/fpdf.php');

include('config.php');

$query=mysqli_query($conn,"SELECT * FROM invoice ORDER BY invoice_id DESC LIMIT 1");
$invoice=mysqli_fetch_array($query);
$date1 = $invoice['date'];
$date = new DateTime($date1);
$date_plus = $date->modify("+3 days");

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();


//set font to arial, bold, 14pt
$pdf->SetFont('arial','B',14);

$pdf->Cell(20	,2.5,'',0,1,);
$pdf->Cell(20	,3,'',0,0,);
$pdf->Cell(147	,10,'Rental Room by Glaze',0,0,);
$pdf->Cell(10	,10,'RENT INVOICE',0,1,'R');//end of line

$pdf->SetFont('Times','',12);
$pdf->Cell(20	,10,'',0,0,);
$pdf->Cell(10	,1,'Cikarang, Bekasi, West Java',0,0,);

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('arial','B',12);
$pdf->Cell(70	,5,'Bill From',0,0);
$pdf->Cell(70	,5,'Bill To',0,0);
$pdf->Cell(0	,5,'Invoice No : '.$invoice['invoice_id'],0,1);

//set font to arial, regular, 12pt
$pdf->SetFont('Times','',10);

$pdf->Cell(70	,5,'Name : Admin',0,0);
$pdf->Cell(70	,5,'Name : '.$invoice['tenant_name'],0,0);
$pdf->Cell(130	,5,'',0,1);

//$pdf->Cell(70	,5,'Company Name : '.$invoice['company'],0,0);
$pdf->Cell(70	,5,'Company Name : Rental Room by Glaze',0,0);
$pdf->Cell(130	,5,'Invoice date : '.$invoice['date'],0,1);

$pdf->Cell(70	,5,'Address : Cikarang, Bekasi, West Java',0,0);
$pdf->Cell(70	,5,'Address : '.$invoice['tenant_address'],0,0);
$pdf->Cell(130	,5,'',0,1);

$pdf->Cell(70	,5,'City, ST ZIP Code : Bekasi, 17534',0,0);
$pdf->Cell(70	,5,'City, ST ZIP Code : '.$invoice['zip_code'],0,0);
$pdf->Cell(130	,5,'Due Date : '.$date_plus->format("Y-m-d"),0,1);

$pdf->Cell(70	,5,'Phone : +1 5589 55488 55',0,0);
$pdf->Cell(70	,5,'Phone : '.$invoice['tenant_phone'],0,0);
$pdf->Cell(130	,5,'',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('arial','B',12);

$pdf->Cell(60	,5,'Property Address',1,0,'C');
$pdf->Cell(50	,5,'Rent',1,0,'C');
$pdf->Cell(37	,5,'Free(s)',1,0,'C');
$pdf->Cell(37	,5,'Total',1,1,'C');//end of line

$pdf->SetFont('Times','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query=mysqli_query($conn,"SELECT * from invoice ORDER BY invoice_id DESC LIMIT 1");
$tax=0;
$amount=0;
$price=$invoice['month']*$invoice['price'];
$total=+$price;
while($item=mysqli_fetch_array($query)){
	$pdf->Cell(60	,5,$invoice['tenant_address'],1,0);
	$pdf->Cell(50	,5,'Rp.'.number_format($price),1,0);
	$pdf->Cell(37	,5,'0',1,0);
	$pdf->Cell(37	,5,'Rp.'.number_format($price),1,1,);//end of line
	$amount+=$total;
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(17	,5,'Subtotal',0,0);
$pdf->Cell(37	,5,'Rp.'.number_format($amount),1,1,);//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(17	,5,'Total ',0,0);
$pdf->Cell(37	,5,'Rp.'.number_format($amount),1,1,);//end of line

$pdf->Cell(189	,15,'',0,1);//end of line
$pdf->SetFont('arial','B',12);
$pdf->Cell(190	,5,'Terms and Conditions',0,1,'C');

$pdf->Cell(189	,8,'',0,1);//end of line

$pdf->SetFont('arial','B',11);
$pdf->Cell(190	,5,'- Payment can be transferred via : ',0,1,'L');

$pdf->SetFont('Times','',10);
$pdf->Cell(2.5	,3,'',0,0,);
$pdf->Cell(190	,3,'BANK MANDIRI (144135729367) a.n. SEKAR MAHARANI',0,1,'L');

$pdf->Cell(189	,10,'',0,1);//end of line

$pdf->SetFont('Arial','B',11);
$pdf->Cell(190	,3,'- Note : ',0,1,'L');

$pdf->SetFont('Times','',10);
$pdf->Cell(2.5	,3,'',0,0,);
$pdf->MultiCell(150	,5,'Thank you for your business. Please send payment withen 3 days of receiving this invoice. There will be a 0.5% per day on late invoices. Make sure the total value of your bill is correct according to the name listed above. If you have any questions regarding this invoice, please call +6282364510307.',0,'L');



$pdf->Output();
?>