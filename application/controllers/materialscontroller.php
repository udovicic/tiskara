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
			$week = sprintf('%02u', $_POST['week']);
			$month = sprintf('%02u', $_POST['month']);
			$year = $_POST['year'];
			
			$date = $week . '/' . $month .'/' . $year;

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
	}
}