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
		$date = array('date' => $date);

		// delete previous entry
		$sql = 'DELETE FROM materials WHERE datestamp=:date';
		$this->query($sql, $date);

		// keys
		$materials = array('plate_1', 'plate_2', 'plate_3', 'paper_1', 'paper_1s', 'paper_2', 'paper_2s', 'paper_3', 'paper_3s', 'paper_4', 'paper_4s', 'color_c', 'color_m', 'color_y', 'color_k');
	// prepare sql for retreiving materials
		// select sums
		$sql = 'SELECT ';
		foreach ($materials as $value) {
			$sql .= "(sum($value) * frequency) as $value, ";
		}

		// add values
		$sql = substr($sql, 0, -2) . ' FROM publications WHERE publication_id IN (';
		foreach ($id as $i) {
			$sql .= $i .', ';
		}
		$sql = substr($sql,0,-2) . ')';

		$materials = $this->query($sql);

	// prepare results for storing materials
		$fields = 'INSERT INTO materials (datestamp, ';
		$sql = '';
		foreach ($materials[0] as $material => $value) {
			$sql .= $value . ', ';
			$fields .= $material . ', ';
		}
		$sql = substr($fields,0,-2) . ') VALUES (:date, ' . substr($sql,0,-2) . ')';
		$this->query($sql, $date);
	}
/**
 * Fetch log entries for requested datestamps
 *
 * @param array $weeks List of datestamps
 */
	function weekly($weeks)
	{
		$results = array();
		foreach ($weeks as $week => $value) {
			$sql = 'SELECT * FROM materials WHERE datestamp=:datestamp';
			$result = $this->query($sql, array('datestamp' => $value));
			$results[$week] = $result[0];
		}

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
		$materials = array('plate_1', 'plate_2', 'plate_3', 'paper_1', 'paper_1s', 'paper_2', 'paper_2s', 'paper_3', 'paper_3s', 'paper_4', 'paper_4s', 'color_c', 'color_m', 'color_y', 'color_k');
		$results = array();

	// prepare sql for retreiving materials
		// select sums
		$sql = 'SELECT ';
		foreach ($materials as $value) {
			$sql .= "sum($value) as $value, ";
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
			$results[$month] = $materials[0];
		}

		return $results;
	}
}