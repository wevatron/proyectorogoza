<?php
require('../fpdf.php');

class PDF extends FPDF
{
protected $col = 0; // Columna actual
protected $y0;      // Ordenada de comienzo de la columna

function Header()
{
	// Cabacera
	global $title;

	$this->SetFont('Arial','B',15);
	$w = $this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	$this->SetLineWidth(1);
	$this->Cell($w,9,$title,1,1,'C',true);
	$this->Ln(10);
	// Guardar ordenada
	$this->y0 = $this->GetY();
}

function Footer()
{
	// Pie de página
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->SetTextColor(128);
	$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function SetCol($col)
{
	// Establecer la posición de una columna dada
	$this->col = $col;
	$x = 10+$col*65;
	$this->SetLeftMargin($x);
	$this->SetX($x);
}

function AcceptPageBreak()
{
	// Método que acepta o no el salto automático de página
	if($this->col<2)
	{
		// Ir a la siguiente columna
		$this->SetCol($this->col+1);
		// Establecer la ordenada al principio
		$this->SetY($this->y0);
		// Seguir en esta página
		return false;
	}
	else
	{
		// Volver a la primera columna
		$this->SetCol(0);
		// Salto de página
		return true;
	}
}

function ChapterTitle($num, $label)
{
	// Título
	$this->SetFont('Arial','',12);
	$this->SetFillColor(200,220,255);
	$this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
	$this->Ln(4);
	// Guardar ordenada
	$this->y0 = $this->GetY();
}

function ChapterBody($file)
{
	// Abrir fichero de texto
	//$txt = file_get_contents($file);

	$txt = "Para dar cumplimiento al objetivo mencionado en el Artículo 3° inciso B) de la Ley del Monte de Piedad del Estado de Oaxaca, referente a las aportaciones en beneficio asistencial de Instituciones Públicas y Privadas, comunidades y personas del Estado de Oaxaca; derivado del oficio de  solicitud y anexos, hechos llegar a esta Entidad por el Lic. Christian Holm Rodríguez, Director General del Sistema DIF Oaxaca, instruyo que se realice el pago de $3,931.33 (TRES MIL NOVECIENTOS TREINTA Y UNO PESOS 33/100 M.N.), recurso que será destinado para la  adquisición de Una mesa de exploración sencilla futuro, bienes que serán donados al Sistema Estatal DIF Oaxaca como parte del Programa 1 denominado “Calidez en Familia” del proyecto ”Asistencia Social";
	// Fuente
	$this->SetFont('Times','',12);
	// Imprimir texto en una columna de 6 cm de ancho
	$this->MultiCell(60,5,$txt);
	$this->MultiCell(10,5,$txt);
	$this->Ln();
	// Cita en itálica
	$this->SetFont('','I');
	$this->Cell(0,5,'(fin del extracto)');
	// Volver a la primera columna
	$this->SetCol(0);
}

function PrintChapter($num, $title, $file)
{
	// Añadir capítulo
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
$pdf->Output();
?>
