<?php
//include connection file 
include('pdf/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=medicapp','root','');

 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('pdf/1.jpg',10,10,50);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(100,40,'Lista pacienti',2,0,'C');
    // Line break
    $this->Ln(40);

}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}


function headerTable()
{
    $this ->SetFont('Times','B',12);
    $this ->Cell(40,20,'Nume',1,0,'C');
    $this ->Cell(40,20,'Prenume',1,0,'C');
    $this ->Cell(40,20,'Nume utilizator',1,0,'C');
    $this ->Cell(60,20,'Email',1,0,'C');
    $this ->Cell(40,20,'Telefon',1,0,'C');
    $this ->Cell(40,20,'Data creere',1,0,'C');
   
    $this ->Ln();


}

function viewTable($db){
    $this ->SetFont('Times','',12);
    $stmt = $db->query('SELECT * FROM patients');
    while($data = $stmt->fetch(PDO::FETCH_OBJ)){

        $this ->Cell(40,20,$data->first_name,1,0,'C');
        $this ->Cell(40,20,$data->last_name,1,0,'C');
        $this ->Cell(40,20,$data->user_name,1,0,'C');
        $this ->Cell(60,20,$data->email,1,0,'C');
        $this ->Cell(40,20,$data->phone,1,0,'C');
        $this ->Cell(40,20,$data->created_at,1,0,'C');
        $this-> Ln();
    }


}



}
 

$pdf = new PDF();
//header
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin(15);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>