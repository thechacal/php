<?php
require_once('config/lang/por.php');
require_once('tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->SetFillColor(0, 160, 30);
		$this->SetTextColor(255);
		$this->SetDrawColor(255);
		$this->SetLineWidth(0.7);
		$this->SetFont('', 'B');
		// Header
		$w = array(115, 115, 35);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, utf8_encode($header[$i]), 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(255, 248, 197);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$this->Cell($w[0], 6, utf8_encode($row[0]), 'LR', 0, 'L', $fill);
			$this->Cell($w[1], 6, utf8_encode($row[1]), 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}



