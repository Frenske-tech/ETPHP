<?php
$rid = $_GET['id'];
require('../../fpdf/fpdf.php');

require('../../fpdf/config.php');


if($_GET['id']) {
    $id = $_GET['id'];
}
//Geeft de gegevens voor de bon aan
$sql1 = "SELECT bestelling.Tafel, menuitem.Menuitem, menuitem.Prijs, bestelling.Aantal, bestelling.Totaalprijs, bestelling.Datum, bestelling.Tijd, bestelling.Contant FROM bestelling JOIN menuitem ON bestelling.menuitemcode = menuitem.menuitemcode WHERE BestellingID = {$id}";

$result = mysqli_query($connect, $sql1);
$test = mysqli_num_rows($result);
	$column_aantal = "";
	$column_datum = "";
	$column_tijd = "";
	$column_tafel = "";
	$column_tp = "";
	$column_contant = "";
	
	//Fetcht de nodige rows voor de bon
	while($row = mysqli_fetch_array($result))
{
	//Maakt rows en columns
    $datum = $row["Datum"];
    $tijd = $row["Tijd"];
    $tafel = $row["Tafel"];
    $prijs = $row["Prijs"];
    $tp		= $row["Totaalprijs"];
    $aantal = $row["Aantal"];
    $contant = $row["Contant"];	

	$column_aantal = $column_aantal.$aantal. "\n";
    $column_datum = $column_datum.$datum."\n";
    $column_tijd = $column_tijd.$tijd."\n";
    $column_tafel = $column_tafel.$tafel."\n";
    $column_tp = $column_tp.$tp."\n";
    $column_contant = $column_contant.$contant."\n";
    

}

$result1 = mysqli_query($connect, $sql1);
$test1 = mysqli_num_rows($result1);
	$column_prijs = "";
	$total = $row["Aantal"];
	$column_menuitem = "";

	while($row = mysqli_fetch_array($result1))
{
	$aantal		= $row["Aantal"];
	$menuitem = $row["Menuitem"];
    $real_price = $row["Prijs"];
    $price_to_show = $row["Prijs"];

    $column_menuitem = $column_menuitem.$menuitem."\n";
    $column_prijs = $column_prijs.$price_to_show."\n";

    //Neem de totaal prijs op
    $total = $total+$tp;
}
//Maakt de PDF-pagina aan
$pdf=new FPDF();
$pdf->AddPage();
$Y_Fields_Name_position = 20;
$Y_Table_Position = 26;

//Maakt de Tabel-cellen aan met hun respectieve X en Y (Horizontaal en Verticaal) gegevens, hierin staan de titels en gegevens van alle databasegegevens die worden uitgeprint in de PDF file. 
$pdf->SetFont('Arial','B',12);
$pdf->SetX(5);
$pdf->Cell(20,6,'Tafel');
$pdf->SetX(25);
$pdf->Cell(20,6,'Datum');
$pdf->SetX(55);
$pdf->Cell(30,6,'Tijd');
$pdf->SetX(115);
$pdf->Ln();

$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(20,6,$column_tafel,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(30,6,$column_datum,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(30,6,$column_tijd,1);	
$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);

$pdf->Ln();
$pdf->SetY(90);
$pdf->SetX(5);
$pdf->MultiCell(30,6,'Aantal');
$pdf->SetY(90);
$pdf->SetX(35);
$pdf->Cell(30,6,'Menu-item');
$pdf->SetY(90);
$pdf->SetX(85);
$pdf->Cell(30,6, 'Prijs');
$pdf->SetY(90);
$pdf->SetX(105);
$pdf->Cell(20,6, 'Totaal');
$pdf->SetY(90);
$pdf->SetX(125);
$pdf->Cell(20,6, 'Contant');
$pdf->SetY(90);
$pdf->SetX(145);
$pdf->Cell(20,6, 'Terug');


$pdf->Ln();
$pdf->SetY(100);
$pdf->SetX(5);
$pdf->MultiCell(30,6,$column_aantal,1);
$pdf->SetY(100);
$pdf->SetX(35);
$pdf->MultiCell(50,6,$column_menuitem,1);
$pdf->SetY(100);
$pdf->SetX(85);
$pdf->MultiCell(20,6,$column_prijs,1);
$pdf->SetY(100);
$pdf->SetX(105);
$pdf->MultiCell(20,6,'$ '.$total,1,'R');
    if ($contant == NULL){
    $pdf->SetY(100);
	$pdf->SetX(125);
	$pdf->MultiCell(20,6,'Niet contant betaald. ',1,'L');

    } else {
    $terug = $contant-$total;
    $pdf->SetY(100);
	$pdf->SetX(125);
	$pdf->MultiCell(20,6,'$ '.$contant,1,'R');
    $pdf->SetY(100);
	$pdf->SetX(145);
	$pdf->MultiCell(20,6,'$ '.$terug,1,'R');

	}


$pdf->Output();
?>