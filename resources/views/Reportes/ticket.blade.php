<?php
require($_SERVER['DOCUMENT_ROOT'].'/Fpdf181/fpdf.php');

class PDF extends FPDF
{
	function Header(){
		$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO",
									 "AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
		global $title;
		global $Titulo;
		$this->SetFont('Arial','B',15);
		$w = $this->GetStringWidth($title)+20;
		$this->Ln(5);
		$this->Cell(0,0,'ROGOZA',0,0,'C');
		$this->SetFont('Arial','',12);
		$this->Ln(6);
		$this->Cell(0,0,$this->reporte,0,1,'C');
		$this->SetFont('Arial','',10);
		$this->Cell(0,0,$this->dia." DE ".$meses[$this->mes-1]." DE ".$this->a,0,1,'R');
		$this->Ln(6);
		$this->SetFont('Arial','',12);
		$this->Cell(0,0,'SUCURSAL: '.$this->SUCU,0,1,'C');
		$this->Ln(6);
		$this->Cell(0,0,'CLIENTE: '.$this->SUCU,0,1,'C');
		$this->Ln(6);
		$this->Cell(0,0,'FOLIO: '.$this->SUCU,0,1,'C');
		$this->Ln(6);
		$this->Cell(0,0,'LUGAR Y FECHA: '.$this->SUCU,0,1,'C');
		$this->Ln(20);
		$this->SetFont('Arial','',10);
		$this->SetX((210-$w)/2);
		$this->SetDrawColor(0,80,180);
		$this->SetFillColor(230,230,0);
		$this->SetTextColor(0,0,0);
		$this->SetLineWidth(2);
		$this->Cell($w,40,$title,0,0,'C',false);
		//$this->Image('../public/img/logomonte.jpg',5,8,30);
		//$this->Image('../public/img/bannerGob.png',170,7,35);
		$this->Ln(5);
	}


	function Footer(){
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes",
									"Sábado");

		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
									 "Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		date_default_timezone_set('America/Mexico_City');

		$this->SetY(-10);
		$this->SetFont('Arial','I',10);
		$this->SetTextColor(128);
		$this->Cell(0,-10,$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1].
								" del ".date('Y')."  Hora: ".date('h:i a'),0,0,'L');

		$this->Cell(0,-10,"ROGOZA S.A. DE C.V. ".$this->PageNo().'/{nb}',0,0,'R');
	}

	public function encabezado($w,$header){
		$this->SetFillColor(231,243,243);
		$this->SetTextColor(0);
		$this->SetDrawColor(154,202,195);
		$this->SetFont('Arial','',12);
		$this->SetLineWidth(.1);
		for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
		$this->Ln();
		$this->SetFillColor(224,235,255);
		$this->SetDrawColor(255);
		$this->SetTextColor(0);
	}





	function FancyTable($header, $data){

	    $w = array(36, 80, 36 ,36);
			$this->encabezado($w,$header);
			$this->SetFont('Arial','',12);
			$fill = false;
			$i=0;
			$total=0;
	    foreach($data as $row){


						if(($i%38)==0 && ($i>3)){
							$this->encabezado($w,$header);
						}
						$this->Cell($w[0],6,abs($row->cantidad),'LR',0,'C',$fill);
						$this->Cell($w[1],6,utf8_decode($row->nombre),'LR',0,'C',$fill);
						$this->Cell($w[2],6,"$ ".number_format($row->precio_venta,2),'LR',0,'C',$fill);
						$this->Cell($w[3],6,"$ ".number_format($row->precio_venta*abs($row->cantidad),2),'LR',0,'C',$fill);
						$total=$total+$row->precio_venta*abs($row->cantidad);
		        $this->Ln();
		        $fill = !$fill;
						$i++;


		    }
				$this->Ln();
				$this->SetFont('Arial','',12);
				$this->Cell($w[0],6,"",'LR',0,'C',false);
				$this->Cell($w[1],6,"",'LR',0,'C',false);
				$this->Cell($w[2],6,"TOTAL",'LR',0,'C',false);
				$this->Cell($w[3],6,"TOTAL+IVA",'LR',0,'C',false);
				$this->Ln();
				$this->Cell($w[0],6,"",'LR',0,'C',false);
				$this->Cell($w[1],6,"",'LR',0,'C',false);
				$this->Cell($w[2],6,number_format($total,2),'LR',0,'C',false);
				$this->Cell($w[3],6,number_format($total+($total*.16),2),'LR',0,'C',false);

		    $this->Cell(array_sum($w),0,'','T');
				$this->Ln(10);
	}


}

	$firma = "																																									GERENTE																																																																																																							    	CONTADOR


																							___________________________																																																																									___________________________

						   														";


$pdf = new PDF();
$pdf->area=utf8_decode("DEPOSITARÍA");
$pdf->reporte=utf8_decode($Reporte);
$pdf->SUCU = utf8_decode($Sucursal);
$fecha2=explode("-",$Fecha);
if($fecha2[1]<'10'){
	$fecha2[1]=substr($fecha2[1],1);
	$pdf->mes = $fecha2[1];
}elseif($fecha2[1]>'9'){
	$pdf->mes = $fecha2[1];
}
$pdf->a = $fecha2[0];
$pdf->dia = $fecha2[2];

$pdf->AliasNbPages();

$header = array('Cantidad',utf8_decode('Artículo'),'Precio','Importe');
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
if (!empty($desgloses)) {
	$pdf->FancyTable($header,$desgloses);
}






$pdf->Output();
exit();

?>
