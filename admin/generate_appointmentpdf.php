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
    $this->Cell(100,40,'Lista programari',2,0,'C');
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
    $this ->Cell(40,20,'ID Programare',1,0,'C');
    $this ->Cell(40,20,'Pacient',1,0,'C');
    $this ->Cell(40,20,'Departament',1,0,'C');
    $this ->Cell(120,20,'Adresa programarii',1,0,'C');

   
    $this ->Ln();


}

function viewTable($db){
    $this ->SetFont('Times','',12);
    $stmt = $db->query('SELECT * FROM `appointment` LEFT JOIN patients ON appointment.patient_id = patients.patient_id LEFT JOIN departments ON appointment.dpt_id = departments.id');
    while($data = $stmt->fetch(PDO::FETCH_OBJ)){
        $this ->Cell(40,20,$data->id,1,0,'C');
        $this ->Cell(40,20,$data->first_name . ' ' . $data->last_name,1,0,'C');
        $this ->Cell(40,20,$data->name,1,0,'C');
        $this ->Cell(120,20,$data->address,1,0,'C');
        $this-> Ln();
    }


}



}
 

$pdf = new PDF();
//header
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetLeftMargin(20);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>