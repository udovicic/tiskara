<?php
/**
 * Publications model
 */
class Publication extends Core\Model
{
/**
 * Add new publication to database
 *
 * @param array $data key-pair values of database column and value
 */
	function add($data)
	{
		// sanitize decimal format
		$data = $this->formatNumbers($data);

		// prepare statement
		$sql = 'INSERT INTO publications (';
		$values = "(";

		// fill values and fields
		foreach ($data as $field => $value) {
			$sql .= $field . ', ';
			$values .= ':' . $field . ", ";
		}
		$sql = substr($sql, 0, -2) . ') VALUES ' . substr($values, 0, -2) . ')';

		// execute statement
		$this->query($sql, $data);
	}
/**
 * Edit publication
 *
 * @param array $data key-pair values of database column and value
 */
	function edit($data)
	{
		// sanitize decimal format
		$data = $this->formatNumbers($data);

		// prepare statement
		$sql = 'UPDATE publications SET ';

		// fill values and fields
		foreach ($data as $field => $value) {
			if ($field == 'publication_id') continue;
			$sql .= $field . '=:' . $field . ', ';
		}
		$sql = substr($sql, 0, -2) . ' WHERE publication_id=:publication_id';

		// execute statement
		$this->query($sql, $data);
	}
/**
 * Replace , with . in decimal fields
 *
 * @param array $data key-pair values of database column and value
 */
	function formatNumbers($data)
	{
		$data['color_c'] = str_replace(',', '.', $data['color_c']);
		$data['color_m'] = str_replace(',', '.', $data['color_m']);
		$data['color_y'] = str_replace(',', '.', $data['color_y']);
		$data['color_k'] = str_replace(',', '.', $data['color_k']);

		return $data;
	}
}
