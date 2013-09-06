<?php
/** PDF output enabler
 *
 * Manage pdf output
 */

namespace Extend;

class PDF extends tFPDF
{
/* Current date */
	private $date;

/**
 * Color consumption report
 *
 * Generates PDF report
 *
 * @param array $monthly Totals on monthly basis
 * @param array $weekly Totals on weekly basis
 */
	function color($monthly, $weekly)
	{
		// new page
		$this->AddPage();

		// header
		$this->SetFont('DejaVu','B',11);
		$this->Cell(0, 5, 'Glas Slavonije d.d.', 0, 1, 'L');
		$this->SetFont('DejaVu','',8);
		$this->Cell(0, 4, 'Osijek, ' . $this->date , 0, 1, 'L');
		$this->Ln(3);
		$this->Cell(0, 4, 'UPRAVI DRUŠTVA', 0, 1, 'L');
		$this->Ln(3);
		$this->SetFont('DejaVu','',14);
		$this->Cell(0, 7, 'Plan potrošnje boje na bazi mjeseca i tjedna', 0, 1, 'C');
		$this->Ln(7);
		$this->SetFont('DejaVu','',8);

		// header color and font setup
		$this->SetLineWidth(.3);
		$this->SetFillColor(200, 200, 255);
		$this->SetFont('DejaVu', 'B', 10);

// monthly
		// Header info
		$w = array(45, 35, 35, 35, 35);
		$w_sum = 0;
		$head = array('Mjesec', 'Cyan', 'Magenta', 'Yellow', 'Black');
		for ($i=0; $i<count($head); $i++) {
			$this->Cell($w[$i], 6, $head[$i], 1, 0, 'C', true);
			$w_sum += $w[$i];
		}
		$this->Ln();

		// data color and font setup
		$this->SetFillColor(224, 235, 255);
		$this->SetFont('DejaVu', '', 10);

		// Data
		$fill = false;
		foreach ($monthly as $month => $value) {
			$this->Cell($w[0], 6, $month, 'LR', 0, 'C', $fill);
			
			$this->Cell($w[1], 6, $value['color_c'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $value['color_m'], 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 6, $value['color_y'], 'LR', 0, 'C', $fill);
			$this->Cell($w[4], 6, $value['color_k'], 'LR', 0, 'C', $fill);
			
			//new line
			$this->ln();

			// toggle fill
			$fill = !$fill;
		}
		// table bottom border
		$this->Cell($w_sum, 6, '', 'T', 0, 'C', 0);
		$this->ln(5);

// weekly
		$this->SetFillColor(200, 200, 255);
		$this->SetFont('DejaVu', 'B', 10);
		// Header info
		$head = array('Tjedan', 'Cyan', 'Magenta', 'Yellow', 'Black');
		for ($i=0; $i<count($head); $i++) {
			$this->Cell($w[$i], 6, $head[$i], 1, 0, 'C', true);
		}
		$this->Ln();

		// data color and font setup
		$this->SetFillColor(224, 230, 255);
		$this->SetFont('DejaVu', '', 10);

		// Data
		$fill = false;
		foreach ($weekly as $week => $value) {
			$this->Cell($w[0], 6, $week, 'LR', 0, 'C', $fill);
			
			$this->Cell($w[1], 6, $value['color_c'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $value['color_m'], 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 6, $value['color_y'], 'LR', 0, 'C', $fill);
			$this->Cell($w[4], 6, $value['color_k'], 'LR', 0, 'C', $fill);
			
			//new line
			$this->ln();

			// toggle fill
			$fill = !$fill;
		}
		// table bottom border
		$this->Cell($w_sum, 7, '', 'T', 1, 'C', 0);

		// footer
		$this->SetFont('DejaVu','',8);
		$this->Cell(115, 7, 'STANJE REPROMATERIJALA NA DAN: ' . $this->date, 0, 0, 'L', 0);
		$this->Cell(0, 7, 'REPROMATERIJAL U DOLASKU:', 0, 1, 'L', 0);

		$this->Cell(45, 7, 'BOJA', 1, 0, 'C', 0);
		$this->Cell(35, 7, 'KOLIČINA (kg)', 1, 1, 'C', 0);
		$this->Cell(45, 7, 'PLAVA', 1, 0, 'C', 0);
		$this->Cell(35, 7, '', 1, 1, 'C', 0);
		$this->Cell(45, 7, 'CRVENA', 1, 0, 'C', 0);
		$this->Cell(35, 7, '', 1, 1, 'C', 0);
		$this->Cell(45, 7, 'ŽUTA', 1, 0, 'C', 0);
		$this->Cell(35, 7, '', 1, 1, 'C', 0);
		$this->Cell(45, 7, 'CRNA', 1, 0, 'C', 0);
		$this->Cell(35, 7, '', 1, 1, 'C', 0);

		$this->ln(10);
		$this->setX(130);
		$this->Cell(50, 1, '', 'B', 0, 'C', 0);

	}

/**
 * Plates consumption report
 *
 * Generates PDF report
 *
 * @param array $monthly Totals on monthly basis
 * @param array $weekly Totals on weekly basis
 */
	function plate($monthly, $weekly)
	{
		// new page
		$this->AddPage();

		// header
		$this->SetFont('DejaVu','B',11);
		$this->Cell(0, 5, 'Glas Slavonije d.d.', 0, 1, 'L');
		$this->SetFont('DejaVu','',8);
		$this->Cell(0, 4, 'Osijek, ' . $this->date , 0, 1, 'L');
		$this->Ln(3);
		$this->Cell(0, 4, 'UPRAVI DRUŠTVA', 0, 1, 'L');
		$this->Ln(3);
		$this->SetFont('DejaVu','',14);
		$this->Cell(0, 7, 'Plan potrošnje CTP ploča na bazi mjeseca i tjedna', 0, 1, 'C');
		$this->Ln(7);
		$this->SetFont('DejaVu','',8);

		// header color and font setup
		$this->SetLineWidth(.3);
		$this->SetFillColor(200, 200, 255);
		$this->SetFont('DejaVu', 'B', 10);

// monthly
		// Header info
		$w = array(47, 50, 50, 50);
		$w_sum = 0;
		$head = array('Mjesec', '1010x658', '745x605', '740x676');
		for ($i=0; $i<count($head); $i++) {
			$this->Cell($w[$i], 6, $head[$i], 1, 0, 'C', true);
			$w_sum += $w[$i];
		}
		$this->Ln();

		// data color and font setup
		$this->SetFillColor(224, 235, 255);
		$this->SetFont('DejaVu', '', 10);

		// Data
		$fill = false;
		foreach ($monthly as $month => $value) {
			$this->Cell($w[0], 6, $month, 'LR', 0, 'C', $fill);
			
			$this->Cell($w[1], 6, $value['plate_1'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $value['plate_2'], 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 6, $value['plate_3'], 'LR', 0, 'C', $fill);
			
			//new line
			$this->ln();

			// toggle fill
			$fill = !$fill;
		}
		// table bottom border
		$this->Cell($w_sum, 6, '', 'T', 0, 'C', 0);
		$this->ln(5);

// weekly
		$this->SetFillColor(200, 200, 255);
		$this->SetFont('DejaVu', 'B', 10);
		// Header info
		$head = array('Tjedan', '1010x658', '745x605', '740x676');
		for ($i=0; $i<count($head); $i++) {
			$this->Cell($w[$i], 6, $head[$i], 1, 0, 'C', true);
		}
		$this->Ln();

		// data color and font setup
		$this->SetFillColor(224, 230, 255);
		$this->SetFont('DejaVu', '', 10);

		// Data
		$fill = false;
		foreach ($weekly as $week => $value) {
			$this->Cell($w[0], 6, $week, 'LR', 0, 'C', $fill);
			
			$this->Cell($w[1], 6, $value['plate_1'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $value['plate_2'], 'LR', 0, 'C', $fill);
			$this->Cell($w[3], 6, $value['plate_3'], 'LR', 0, 'C', $fill);
			
			//new line
			$this->ln();

			// toggle fill
			$fill = !$fill;
		}
		// table bottom border
		$this->Cell($w_sum, 6, '', 'T', 1, 'C', 0);

		// footer
		$this->SetFont('DejaVu','',8);
		$this->Cell(115, 7, 'STANJE REPROMATERIJALA NA DAN: ' . $this->date, 0, 0, 'L', 0);
		$this->Cell(0, 7, 'REPROMATERIJAL U DOLASKU:', 0, 1, 'L', 0);

		$this->Cell(47, 7, 'PLOČE FORMATA', 1, 0, 'C', 0);
		$this->Cell(52, 7, 'KOLIČINA (kg)', 1, 1, 'C', 0);
		$this->Cell(47, 7, '1010x658', 1, 0, 'C', 0);
		$this->Cell(52, 7, '', 1, 1, 'C', 0);
		$this->Cell(47, 7, '745x605', 1, 0, 'C', 0);
		$this->Cell(52, 7, '', 1, 1, 'C', 0);
		$this->Cell(47, 7, '740x676', 1, 0, 'C', 0);
		$this->Cell(52, 7, '', 1, 1, 'C', 0);

		$this->ln(10);
		$this->setX(130);
		$this->Cell(50, 1, '', 'B', 0, 'C', 0);
	}

/**
 * Paper consumption report
 *
 * Generates PDF report
 *
 * @param array $monthly Totals on monthly basis
 * @param array $weekly Totals on weekly basis
 */
	function paper($monthly, $weekly)
	{
		// new page
		$this->AddPage();

				// header
		$this->SetFont('DejaVu','B',11);
		$this->Cell(0, 5, 'Glas Slavonije d.d.', 0, 1, 'L');
		$this->SetFont('DejaVu','',8);
		$this->Cell(0, 4, 'Osijek, ' . $this->date , 0, 1, 'L');
		$this->Ln(3);
		$this->Cell(0, 4, 'UPRAVI DRUŠTVA', 0, 1, 'L');
		$this->Ln(3);
		$this->SetFont('DejaVu','',14);
		$this->Cell(0, 7, 'Plan potrošnje papira na bazi mjeseca i tjedna', 0, 1, 'C');
		$this->Ln(7);
		$this->SetFont('DejaVu','',10);

		// header color and font setup
		$this->SetLineWidth(.3);
		$this->SetFillColor(200, 200, 255);
		$this->SetFont('DejaVu', 'B', 10);

// monthly
		// Header info
		$w = array(32, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17);
		$w_sum = 0;
		$head = array('Mjesec', '84/45', '42/45', 'Ukupno', '84/52', '42/52', 'Ukupno', '90/45', '45/45', 'Ukupno', '90/52', '45/52', 'Ukupno');
		for ($i=0; $i<count($head); $i++) {
			$this->Cell($w[$i], 6, $head[$i], 1, 0, 'C', true);
			$w_sum += $w[$i];
		}
		$this->Ln();

		// data color and font setup
		$this->SetFillColor(224, 235, 255);
		$this->SetFont('DejaVu', '', 10);

		// Data
		$fill = false;
		foreach ($monthly as $month => $value) {
			$this->Cell($w[0], 6, $month, 'LR', 0, 'C', $fill);
			$this->Cell($w[1], 6, $value['paper_1'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $value['paper_1s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'B', 10);
			$this->Cell($w[3], 6, $value['paper_1'] + $value['paper_1s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			$this->Cell($w[4], 6, $value['paper_2'], 'LR', 0, 'C', $fill);
			$this->Cell($w[5], 6, $value['paper_2s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'B', 10);
			$this->Cell($w[6], 6, $value['paper_2'] + $value['paper_2s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			$this->Cell($w[7], 6, $value['paper_3'], 'LR', 0, 'C', $fill);
			$this->Cell($w[8], 6, $value['paper_3s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'B', 10);
			$this->Cell($w[9], 6, $value['paper_3'] + $value['paper_3s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			$this->Cell($w[10], 6, $value['paper_4'], 'LR', 0, 'C', $fill);
			$this->Cell($w[11], 6, $value['paper_4s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'B', 10);
			$this->Cell($w[12], 6, $value['paper_4'] + $value['paper_4s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			
			//new line
			$this->ln();

			// toggle fill
			$fill = !$fill;
		}
		// table bottom border
		$this->Cell($w_sum, 6, '', 'T', 0, 'C', 0);
		$this->ln(5);

// weekly
		$this->SetFillColor(200, 200, 255);
		$this->SetFont('DejaVu', 'B', 10);
		// Header info
		$head = array('Tjedan', '84/45', '42/45', 'Ukupno', '84/52', '42/52', 'Ukupno', '90/45', '45/45', 'Ukupno', '90/52', '45/52', 'Ukupno');
		for ($i=0; $i<count($head); $i++) {
			$this->Cell($w[$i], 6, $head[$i], 1, 0, 'C', true);
		}
		$this->Ln();

		// data color and font setup
		$this->SetFillColor(224, 230, 255);
		$this->SetFont('DejaVu', '', 10);

		// Data
		$fill = false;
		foreach ($weekly as $week => $value) {
			$this->Cell($w[0], 6, $week, 'LR', 0, 'C', $fill);
			
			$this->Cell($w[1], 6, $value['paper_1'], 'LR', 0, 'C', $fill);
			$this->Cell($w[2], 6, $value['paper_1s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'BI', 11);
			$this->Cell($w[3], 6, $value['paper_1'] + $value['paper_1s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			$this->Cell($w[4], 6, $value['paper_2'], 'LR', 0, 'C', $fill);
			$this->Cell($w[5], 6, $value['paper_2s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'BI', 11);
			$this->Cell($w[6], 6, $value['paper_2'] + $value['paper_2s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			$this->Cell($w[7], 6, $value['paper_3'], 'LR', 0, 'C', $fill);
			$this->Cell($w[8], 6, $value['paper_3s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'BI', 11);
			$this->Cell($w[9], 6, $value['paper_3'] + $value['paper_3s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			$this->Cell($w[10], 6, $value['paper_4'], 'LR', 0, 'C', $fill);
			$this->Cell($w[11], 6, $value['paper_4s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', 'BI', 11);
			$this->Cell($w[12], 6, $value['paper_4'] + $value['paper_4s'], 'LR', 0, 'C', $fill);
			$this->SetFont('DejaVu', '', 10);
			
			//new line
			$this->ln();

			// toggle fill
			$fill = !$fill;
		}
		// table bottom border
		$this->Cell($w_sum, 6, '', 'T', 0, 'C', 0);
	}

/**
 * Class constructor
 */
	function __construct()
	{
		$this->tFPDF('L'); // Call default constructor - set landscape mode
		$this->AliasNbPages();

		$date = new \DateTime();
		$this->date = $date->format('d.m.Y');

		// Add a Unicode font
		$this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
		$this->AddFont('DejaVu','B','DejaVuSansCondensed-Bold.ttf',true);
		$this->AddFont('DejaVu','I','DejaVuSansCondensed-Oblique.ttf',true);
		$this->AddFont('DejaVu','BI','DejaVuSansCondensed-BoldOblique.ttf',true);

		// Set default font
		$this->SetFont('DejaVu','',14);

		// Autobrake page
		$this->SetAutoPageBreak(true, 25);
	}

/**
 * Class destructor
 */
	function __destruct()
	{
		// output pdf
		$this->Output();
	}
}