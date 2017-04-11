<?php
require('../fpdf/fpdf_mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Client Visit',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','noodee','mypass');
mysql_select_db('dreamhome');

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->AddCol('clientno', 40, 'Client No', 'C');
$pdf->AddCol('fname', 40, 'First Name', 'C');
$pdf->AddCol('lname', 40, 'Last Name', 'C');
$pdf->AddCol('propertyno', 40, 'Property No', 'C');
$pdf->AddCol('viewdate', 40, 'Viewdate', 'C');
$pdf->Table('SELECT DISTINCT clientno, fname, lname, propertyno, viewdate FROM client NATURAL JOIN viewing');
$pdf->Output();
?>
