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
		// keys
		$materials = array('plate_1', 'plate_2', 'plate_3', 'paper_1', 'paper_1s', 'paper_2', 'paper_2s', 'paper_3', 'paper_3s', 'paper_4', 'paper_4s', 'color_c', 'color_m', 'color_y', 'color_k');
	// prepare sql for retreiving materials
		// select sums
		$sql = 'SELECT ';
		foreach ($materials as $value) {
			$sql .= "sum($value) as $value, ";
		}

		// add values
		$sql = substr($sql, 0, -2) . ' FROM publications WHERE publication_id IN (';
		foreach ($id as $i) {
			$sql .= $i .', ';
		}
		$sql = substr($sql,0,-2) . ')';

		$materials = $this->query($sql);

	// prepare results for storing materials
		$fields = 'INSERT INTO materials (timestamp, ';
		$sql = '';
		foreach ($materials[0] as $material => $value) {
			$sql .= $value . ', ';
			$fields .= $material . ', ';
		}
		$sql = substr($fields,0,-2) . ') VALUES (:date, ' . substr($sql,0,-2) . ')';
		$this->query($sql, array('date' => $date));
	}
}