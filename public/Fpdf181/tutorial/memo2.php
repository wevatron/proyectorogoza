<?php
require('../fpdf.php');

class PDF extends FPDF
{
function Header()
{
	global $title;

	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Calculamos ancho y posición del título.
	$w = $this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	// Colores de los bordes, fondo y texto
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	// Ancho del borde (1 mm)
	$this->SetLineWidth(2);
	// Título
	$this->Cell($w,9,$title,1,1,'C',true);
	// Salto de línea
	$this->Ln(10);
}

function Footer()
{
	// Posición a 1,5 cm del final
	$this->SetY(-15);
	// Arial itálica 8
	$this->SetFont('Arial','I',8);
	// Color del texto en gris
	$this->SetTextColor(128);
	// Número de página
	$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
	// Arial 12
	$this->SetFont('Arial','',12);
	// Color de fondo
	$this->SetFillColor(200,220,255);
	// Título
	$this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
	// Salto de línea
	$this->Ln(4);
}

function ChapterBody($file)
{
	// Leemos el fichero
	//$txt = file_get_contents($file);
	$txt = "Para dar cumplimiento al objetivo mencionado en el Artículo 3° inciso B) de la Ley del Monte de Piedad del Estado de Oaxaca, referente a las aportaciones en beneficio asistencial de Instituciones Públicas y Privadas, comunidades y personas del Estado de Oaxaca; derivado del oficio de  solicitud y anexos, hechos llegar a esta Entidad por el Lic. Christian Holm Rodríguez, Director General del Sistema DIF Oaxaca, instruyo que se realice el pago de $3,931.33 (TRES MIL NOVECIENTOS TREINTA Y UNO PESOS 33/100 M.N.), recurso que será destinado para la  adquisición de Una mesa de exploración sencilla futuro, bienes que serán donados al Sistema Estatal DIF Oaxaca como parte del Programa 1 denominado “Calidez en Familia” del proyecto ”Asistencia Social”.

La transferencia deberá realizarse a nombre de: 
LÍDER MUNDIAL MÉDICA S.A DE C.V
CUENTA BANCARIA : 0194758439
BANCO: BANCOMER S.A

Lo anterior, a fin de ser tomado en cuenta para el trámite correspondiente y sin otro particular al respecto, aprovecho la ocasión para enviarle un cordial saludo";
	// Times 12
	$this->SetFont('Times','',12);
	// Imprimimos el texto justificado
	$this->MultiCell(0,5,$txt);
	// Salto de línea
	$this->Ln();
	// Cita en itálica
	$this->SetFont('','I');
	$this->Cell(0,5,'(fin del extracto)');
}

function PrintChapter($num, $title, $file)
{
	$this->AddPage();
	$this->ChapterTitle($num,$title);
	$this->ChapterBody($file);
}
}




$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
$pdf->SetTitle($title);
$pdf->SetAuthor('Julio Verne');
$pdf->PrintChapter(1,'UN RIZO DE HUIDA','20k_c1.txt');
$pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','20k_c2.txt');
$pdf->Output();
?>
