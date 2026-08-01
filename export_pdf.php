<?php
require('../fpdf/fpdf.php');
include('../db.php');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'IT Asset Allocation Report',0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(20,10,'ID',1);
$pdf->Cell(60,10,'Employee',1);
$pdf->Cell(60,10,'Asset',1);
$pdf->Cell(50,10,'Assign Date',1);

$pdf->Ln();

$sql = "SELECT allocation.id,
employees.name,
assets.asset_name,
allocation.assign_date
FROM allocation
JOIN employees ON allocation.employee_id = employees.id
JOIN assets ON allocation.asset_id = assets.id";

$result = mysqli_query($conn, $sql);

$pdf->SetFont('Arial','',11);

while($row = mysqli_fetch_assoc($result))
{
    $pdf->Cell(20,10,$row['id'],1);
    $pdf->Cell(60,10,$row['name'],1);
    $pdf->Cell(60,10,$row['asset_name'],1);
    $pdf->Cell(50,10,$row['assign_date'],1);
    $pdf->Ln();
}

$pdf->Output();
?>