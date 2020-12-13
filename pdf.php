<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


$pdf = new FPDF();
$pdf->AddPage();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
//$pdf->SetFont('times', 'BI', 10);
$pdf->SetFont('times', '', 9);

// add a page
//$pdf->AddPage();

// set cell padding
//$pdf->setCellPaddings(1, 0, 0, 0);


// set some text to print
	/*$txt = <<<EOD
	Test By Liza
	EOD;*/
// print a block of text using Write()
	//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
	
	
	

$line = '------------------------------------------------------------------------------';
/*$x1 = 5;
$x2 = 25;*/

	$num_rows = 38;
	$pblnce = $num_rows;
	$div2 = 1; // it is for Track wether the 2nd div is requires to proceed or not.
	$ttl_page = ceil($num_rows/22);
	$prange = 11;
	$start = 0;
	for($i=1; $i<=$ttl_page; $i++)
	{
		
		$x1 = 5;
		$x2 = 25;

		
$pdf->AddPage();

		if($pblnce < 11) {$prange = $start+$pblnce; $div2 = 0;}
			else { $pblnce = $pblnce-11; }
			
			for($j=$start; $j<$prange; $j++) {
				
			$html = '<table border="1" align="left"><tr><td>
  <table>
	  <tr><td colspan="3">P. DT. 30-Mar-2015&nbsp;&nbsp;&nbsp;&nbsp;Buyer: Olymp &nbsp;&nbsp;&nbsp;&nbsp;VIYELLATEX LTD.</td></tr>
	  <tr>
		  <td><strong>BACK</strong></td>
		  <td><strong>Bundle No.: '.$j.'</strong></td>
		  <td>A. CutID: 28</td>
	  </tr>
	  <tr>
		  <td><strong>Style: 1234567892</strong></td>
		  <td><strong>Color: White</strong></td>
		  <td>Size: S</td>
	  </tr>
	  <tr>
		  <td>Gmt: 1-10</td>
		  <td>2345</td>
		  <td>Qty: 10/ BACK</td>
	  </tr>
	  <tr>
		  <td>Qty: 10</td>
		  <td>Lot No: 12345678</td>
		  <td>Cut No: 165</td>
	  </tr>
  </table>
</td></tr></table>';	

$pdf->writeHTMLCell(90, 0, '5', $x1, $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '8', $x2, $line, 0, 1, 0, true, '', true);

$x1 = $x1+25;
$x2 = $x2+25;
				 
			} $start = $prange; $prange = $prange+11;
			
			if($div2 != 0) { 
	
$x1 = 5;
$x2 = 25;

		if($pblnce < 11) {$prange = $start+$pblnce;}
			else { $pblnce = $pblnce-11; }

			for($j=$start; $j<$prange; $j++) { 
				
									$html = '<table border="1" align="left"><tr><td>
  <table>
	  <tr><td colspan="3">P. DT. 30-Mar-2015&nbsp;&nbsp;&nbsp;&nbsp;Buyer: Olymp &nbsp;&nbsp;&nbsp;&nbsp;VIYELLATEX LTD.</td></tr>
	  <tr>
		  <td><strong>BACK</strong></td>
		  <td><strong>Bundle No.: '.$j.'</strong></td>
		  <td>A. CutID: 28</td>
	  </tr>
	  <tr>
		  <td><strong>Style: 1234567892</strong></td>
		  <td><strong>Color: White</strong></td>
		  <td>Size: S</td>
	  </tr>
	  <tr>
		  <td>Gmt: 1-10</td>
		  <td>2345</td>
		  <td>Qty: 10/ BACK</td>
	  </tr>
	  <tr>
		  <td>Qty: 10</td>
		  <td>Lot No: 12345678</td>
		  <td>Cut No: 165</td>
	  </tr>
  </table>
</td></tr></table>';		

$pdf->writeHTMLCell(90, 0, '108', $x1, $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '111', $x2, $line, 0, 1, 0, true, '', true);

$x1 = $x1+25;
$x2 = $x2+25;
				 
			} $start = $prange; $prange = $prange+11; 
			
	}

$pdf->lastPage();

	}
		

//$pdf->lastPage();
	//$pdf->lastPage();
	
	
	
	
	

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)




//die('Hello World !!!');

/*$html = '<table border="1" align="left"><tr><td>
  <table>
	  <tr><td colspan="3">P. DT. 30-Mar-2015&nbsp;&nbsp;&nbsp;&nbsp;Buyer: Olymp &nbsp;&nbsp;&nbsp;&nbsp;VIYELLATEX LTD.</td></tr>
	  <tr>
		  <td><strong>BACK</strong></td>
		  <td><strong>Bundle No.: 1</strong></td>
		  <td>A. CutID: 28</td>
	  </tr>
	  <tr>
		  <td><strong>Style: 1234567892</strong></td>
		  <td><strong>Color: White</strong></td>
		  <td>Size: S</td>
	  </tr>
	  <tr>
		  <td>Gmt: 1-10</td>
		  <td>2345</td>
		  <td>Qty: 10/ BACK</td>
	  </tr>
	  <tr>
		  <td>Qty: 10</td>
		  <td>Lot No: 12345678</td>
		  <td>Cut No: 165</td>
	  </tr>
  </table>
</td></tr></table>';

$line = '------------------------------------------------------------------------------';
		
//$pdf->writeHTML($html, true, false, true, false, '');

$pdf->writeHTMLCell(90, 0, '5', '5', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '8', '25', $line, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '108', '5', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '111', '25', $line, 0, 1, 0, true, '', true);

$pdf->writeHTMLCell(90, 0, '5', '30', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '8', '50', $line, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '108', '30', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '111', '50', $line, 0, 1, 0, true, '', true);

$pdf->writeHTMLCell(90, 0, '5', '55', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '8', '75', $line, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '108', '55', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '111', '75', $line, 0, 1, 0, true, '', true);

$pdf->writeHTMLCell(90, 0, '5', '80', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '8', '100', $line, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '108', '80', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(90, 0, '111', '100', $line, 0, 1, 0, true, '', true);*/









/*$pdf->Ln(4);

$txt = 'Lorem ipsum dolor sit amet, &nbsp;&nbsp;&nbsp;&nbsp; consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit';

$pdf->MultiCell(55, 5, '[LEFT] '.$txt, 1, 'L', 0, 0, '', '', true);

$pdf->Ln(4);

$pdf->MultiCell(40, 1, '[FIT CELL] '.$txt."\n", 1, 'J', 0, 0, 100, 20, true, 0, false, true, 80, 'M', true);*/




/*$pdf->Ln(4);
// test some inline CSS
$html = '<p>This is just an example of html code to demonstrate some supported CSS inline styles.
<span style="font-weight: bold;">bold text</span>
<span style="text-decoration: line-through;">line-trough</span>
<span style="text-decoration: underline line-through;">underline and line-trough</span>
<span style="color: rgb(0, 128, 64);">color</span>
<span style="background-color: rgb(255, 0, 0); color: rgb(255, 255, 255);">background color</span>
<span style="font-weight: bold;">bold</span>
<span style="font-size: xx-small;">xx-small</span>
<span style="font-size: x-small;">x-small</span>
<span style="font-size: small;">small</span>
<span style="font-size: medium;">medium</span>
<span style="font-size: large;">large</span>
<span style="font-size: x-large;">x-large</span>
<span style="font-size: xx-large;">xx-large</span>
</p>';

$pdf->writeHTML($html, true, false, true, false, '');*/


/*$html = <<<EOD
<table width = "300px" border="1" style="border-collapse:collapse;" align="left">
<tr style="border:1px dotted black;" ><td>
	<table>	
		<tr>
			<td width = "120px">P. DT: 30-Mar-2015</td>
			<td width = "80px">Bundle No-12</td>
			<td width = "100px">A. Cut ID-28</td>
		</tr>
		<tr>
			<td width = "120px">P. DT: 30-Mar-2015</td>
			<td width = "80px">Bundle No</td>
			<td width = "100px">A. Cut ID</td>
		</tr>
	</table>
</td></tr>	
</table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);*/




/*$txt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.

Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.';
	
$pdf->SetFillColor(215, 235, 255);

$pdf->MultiCell(40, 1, '[FIT CELL] '.$txt."\n", 1, 'J', 0, 0, 100, 20, true, 0, false, true, 80, 'M', true);

$pdf->Ln(4);*/




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set color for background
	//$pdf->SetFillColor(215, 235, 255);

// set some text for example
/*$txt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.

Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.';*/

// print a blox of text using multicell()
		//$pdf->MultiCell(80, 5, $txt."\n", 1, 'J', 1, 1, '' ,'', true);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// AUTO-FITTING

// set color for background
		//$pdf->SetFillColor(255, 235, 235);

// Fit text on cell by reducing font size
		//$pdf->MultiCell(40, 1, '[FIT CELL] '.$txt."\n", 1, 'J', 1, 1, 125, 145, true, 0, false, true, 80, 'M', true);

//				Box Width, Min-1, text, 1-is fixed foreach, J-Justify, 1, 1 = Color, (125,145)-Margin, (true, 0, false, true)-Fixed,80-Height, M-Middel Align 

//$pdf->MultiCell(80, 50, $txt."\n", 1, 'J', 1, 1, '' ,'', true);



// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('example_002.pdf', 'I');
//$pdf->Output('example_002.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
$pdf->output();  // try it

?>
