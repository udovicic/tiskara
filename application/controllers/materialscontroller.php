<?php
/**
 * Materials controller
 *
 * Handles generating report about materials consumption
 */
class MaterialsController extends Core\Controller
{
/*
 * Add weekly info
 */
	function add()
	{
		// display modaly
		$this->renderHeader = false;

		// save request
		if (isset($_POST['week'])) {
			// grab vars
			$holder = json_decode($_POST['holder']);
			$date = new DateTime();
			$date->setISODate($_POST['year'], $_POST['week']);

			if ($date->format('W') == '01' && $date->format('m') == '12') {
				$date->setDate($date->format('Y') + 1, 1, 1);
				$date->modify('next Thursday');
			}
			
			$date = $date->format('W/m/Y');

			// store data
			$this->Material->log($holder, $date);

			// redirect
			header('location: ' . SITE_URL . '/publications/listing');
		}

		// retreive names from database
		$data = $_POST['data'];
		$pubs = $this->Material->listPublications(json_decode($data));

		// view variables
		$this->set('publications', $pubs);
		$this->set('holder', htmlentities($data));

		// grab current datestamp
		$date = new DateTime();
		$this->set('week', $date->format('W'));
		$this->set('month', $date->format('m'));
		$this->set('year', $date->format('Y'));
	}

/**
 * Generate printable report
 *
 * @param string $mode Weekly report or report for requested period
 */
	function printable($mode='1')
	{
		$start = new DateTime();
		$end = new DateTime();
		$date = new DateTime();

		// get mode
		if ($mode == 'period' or $mode == 2) {
			$mode = 2;
		} else {
			$mode = 1;
		}

		// generate PDF
		if (isset($_POST['pregled']) == true) {
			$this->renderPage = false;

			// get period
			if ($mode == 2) {
				try {
					$start->setISODate($_POST['year-week-start'], $_POST['week-start']);
					$end->setISODate($_POST['year-week-end'], $_POST['week-end']);
				} catch (Exceptio $ex) {
					$mode = 1;
				}
			}
			if ($mode == 1) {
				$date->setISODate($_POST['year'], $_POST['week']);
				$start = clone $date;
				$end = clone $date;

				$start->modify('-3 weeks');
				$end->modify('+3 weeks');
			}
			
			// requested weeks
			$weeks = array();
			$tmp = clone $start;
			while ($tmp <= $end) {
				if ($tmp->format('W') == '01' && $tmp->format('m') == '12') {
					$tmp->setDate($tmp->format('Y') + 1, 1, 1);
					$end->modify('+1 week');
				}
				$weeks[$tmp->format('W/Y')] = $tmp->format('W/m/Y');

				$tmp->modify('+1 week');
			}

			if ($mode == 2) {
				try {
					$t1 = new DateTime("{$_POST['year-month-start']}-{$_POST['month-start']}-1");
				$t2 = new DateTime("{$_POST['year-month-end']}-{$_POST['month-end']}-1");
					$start = clone $t1;
					$end = clone $t2;
				} catch (Exceptio $ex) {
					$mode = 1;
				}
			}
			// requested months
			$months = array();
			// alter months period if mode 1
			if ($mode == 1) {
				$start = clone $date;
				$end = clone $date;

				$start->modify('-1 month');
				$end->modify('+1 month');
			}

			// select first and last monday in $start and $end
			$start->modify('first Monday of ' .$start->format('M'));
			$end->modify('last Monday of ' . $end->format('M'));

			// generate period datestamps
			$tmp = clone $start;
			while ($tmp <= $end) {
				if ($tmp->format('W') == '01' && $tmp->format('m') == '12') {
					$tmp->setDate($tmp->format('Y') + 1, 1, 1);
				}
				$months[$tmp->format('m/Y')][] = $tmp->format('W/m/Y');

				$tmp->modify('+1 week');
			}

			// fetch results
			$weekly = $this->Material->weekly($weeks);
			$monthly = $this->Material->monthly($months);

			$pdf = new Extend\PDF($date->format('W/Y'));
			$pdf->color($monthly, $weekly);
			$pdf->plate($monthly, $weekly);
			$pdf->paper($monthly, $weekly);
		}


		// display week select form
		$this->set('title', 'Printanje izvještaja');
		$this->set('mode', $mode);

		// grab current datestamp
		$date = new DateTime();
		$this->set('week', $date->format('W'));
		$this->set('year', $date->format('Y'));
	}

/**
 * List names of printed publications for period
 */
	function publications()
	{
		$this->set('mode', 'select');

		// list publications
		if (isset($_POST['week-start']) == true) {
			$this->set('mode', 'list');
			$weekly = false;
			$start = new DateTime();
			$end = new DateTime();

			try {
				// get dates
				$start->setISODate($_POST['year-start'], $_POST['week-start']);
				$end->setISODate($_POST['year-end'], $_POST['week-end']);

				// requested weeks
				$weeks = array();
				$tmp = clone $start;
				while ($tmp <= $end) {
					if ($tmp->format('W') == '01' && $tmp->format('m') == '12') {
						$tmp->setDate($tmp->format('Y') + 1, 1, 1);
						$end->modify('+1 week');
					}
					$weeks[$tmp->format('W/Y')] = $tmp->format('W/m/Y');

					$tmp->modify('+1 week');
				}

				// grab data from db
				$weekly = $this->Material->weekly($weeks);
				$this->set('weekly', $weekly);
			} catch(Exception $ex) {
				$this->set('notify', 'Pogreška u obradi datuma');
			}
		}

		// grab current datestamp
		$date = new DateTime();
		$this->set('title', 'Lista tiskanih izadnja');
		$this->set('week', $date->format('W'));
		$this->set('year', $date->format('Y'));
	}
/**
 * Delete log entry from database
 *
 * @param string $id Loeg entry database id
 */
	function delete($id = '')
	{
		$this->renderPage = false;

		if ($id != '') {
			$this->Material->delete($id);
		}

		header('location:' . SITE_URL . '/materials/publications');
	}
}