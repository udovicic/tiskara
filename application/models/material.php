<?php
/*
 * Material model
 */
class Material extends core\Model
{
/*
 * Gradb names of publications
 *
 * @param array $id List of publication id-s
 * @return array Names od publications
 */
	function listPublications($id)
	{
		$sql =
			'SELECT name, num_pages FROM publications' .
			' WHERE publication_id IN (';

		foreach ($id as $i) {
			$sql .= $i .', ';
		}
		$sql = substr($sql,0,-2) . ')';

		return $this->query($sql);
	}
/*
 * Log material useage to databse
 *
 * @param array $id List of publication id-s
 * @param string $date Datestamp for log entry
 */
	function log($id, $date)
	{
		$arg = array('date' => $date);

		// delete previous entry
		$sql = 'DELETE FROM materials WHERE datestamp=:date';
		$this->query($sql, $arg);

		// get publication names
		$sql = 'SELECT name, num_pages FROM publications WHERE publication_id IN (';
		foreach ($id as $i) {
			$sql .= $i .', ';
		}
		$sql = substr($sql,0,-2) . ')';	
		$pubs = $this->query($sql);
		$names = '';
		foreach ($pubs as $pub) {
			$names .= "{$pub['name']}({$pub['num_pages']}), ";
		}
		$arg['publications'] = substr($names, 0, -2);

		// keys
		$materials = array('plate_1', 'plate_2', 'plate_3', 'paper_1', 'paper_1s', 'paper_2', 'paper_2s', 'paper_3', 'paper_3s', 'paper_4', 'paper_4s', 'color_c', 'color_m', 'color_y', 'color_k');
	// prepare sql for retreiving materials
		// select sums
		$sql = 'SELECT ';
		foreach ($materials as $value) {
			$sql .= "sum($value * frequency) as $value, ";
		}

		// add values
		$sql = substr($sql, 0, -2) . ' FROM publications WHERE publication_id IN (';
		foreach ($id as $i) {
			$sql .= $i .', ';
		}
		$sql = substr($sql,0,-2) . ')';

		$materials = $this->query($sql);

	// prepare results for storing materials
		$fields = 'INSERT INTO materials (datestamp, publications, ';
		$sql = '';
		foreach ($materials[0] as $material => $value) {
			$sql .= $value . ', ';
			$fields .= $material . ', ';
		}
		$sql = substr($fields,0,-2) . ') VALUES (:date, :publications, ' . substr($sql,0,-2) . ')';
		$this->query($sql, $arg);
	}
/**
 * Fetch log entries for requested datestamps
 *
 * @param array $weeks List of datestamps
 */
	function weekly($weeks)
	{
		$results = array();
		$sums = array(
			'material_id' => 0,'datestamp' =>0, 'publications' =>0,
			'plate_1' => 0,'plate_2' => 0,'plate_3' => 0,
			'paper_1' => 0,'paper_1s' => 0,'paper_2' => 0,'paper_2s' => 0,'paper_3' => 0,'paper_3s' => 0,'paper_4' => 0,'paper_4s' => 0,
			'color_c' => 0,'color_m' => 0,'color_y' => 0,'color_k' => 0);
		foreach ($weeks as $week => $value) {
			$sql = 'SELECT * FROM materials WHERE datestamp=:datestamp';
			$result = $this->query($sql, array('datestamp' => $value));
			if ($result != false) foreach ($result[0] as $material => $value) {
				$sums[$material] += $value;
			}
			$results[$week] = $result[0];
		}
		$results['ukupno'] = $sums;
		$results['ukupno']['datestamp'] = '';

		return $results;
	}
/**
 * Fetch log entries for requested datestamps (sums)
 *
 * @param array $months List of datestamps
 */
	function monthly($months)
	{
		// keys
		$results = array();
		$sums = array(
			'material_id' => 0,'datestamp' =>0,
			'plate_1' => 0,'plate_2' => 0,'plate_3' => 0,
			'paper_1' => 0,'paper_1s' => 0,'paper_2' => 0,'paper_2s' => 0,'paper_3' => 0,'paper_3s' => 0,'paper_4' => 0,'paper_4s' => 0,
			'color_c' => 0,'color_m' => 0,'color_y' => 0,'color_k' => 0);

	// prepare sql for retreiving materials
		// select sums
		$sql = 'SELECT ';
		foreach ($sums as $key => $value) {
			$sql .= "sum($key) as $key, ";
		}

		// add values
		$sql = substr($sql, 0, -2) . ' FROM materials WHERE datestamp IN (';
		foreach ($months as $month => $value) {
			$sql_t = "'";
			foreach ($value as $datestamp) {
				$sql_t .= $datestamp . "', '";
			}
			$sql_t = $sql . substr($sql_t, 0, -3) . ')';

			$materials = $this->query($sql_t);
			if ($materials != false) foreach ($materials[0] as $material => $value) {
				$sums[$material] += $value;
			}
			$results[$month] = $materials[0];
		}
		$results['ukupno'] = $sums;
		return $results;
	}
}