<?php
/**
 * Publications controller
 *
 * Addin, deleting and editing publications, log entering */
class PublicationsController extends Core\Controller
{
/**
 *	List all publications
 */
	function listing()
	{
		$publications = $this->Publication->getAll();
		if ($publications == false) {
			$publications = array();
		}

		$this->set('title', 'Izlistanje izdanja');
		$this->set('publications', $publications);
	}

/**
 * Edit publication details
 *
 * @param int $id Id of publication
 */
	function edit($id='')
	{
		$this->renderHeader = false;

		if (isset($_POST['publication_id']) == true) {
			//insert request
			$data = $_POST;
			$this->Publication->edit($data);

			// redirect
			header('location: ' . SITE_URL . '/publications/listing');
		}
		$publication = $this->Publication->select($id);
		$this->set('pub', $publication);
	}

/**
 * Remove publication entry
 */
	function delete($id='')
	{
		$this->renderHeader = false;

		if (isset($_POST['publication_id']) == true) {
			//delete request
			$this->Publication->delete($_POST['publication_id']);

			// redirect
			header('location: ' . SITE_URL . '/publications/listing');
		}

		$publication = $this->Publication->select($id);
		$this->set('pub', $publication);
	}

/**
 * Add new publication
 */
	function add()
	{
		$this->renderHeader = false;

		if (isset($_POST['name']) == true) {
			//insert request
			$data = $_POST;
			$this->Publication->add($data);

			// redirect
			header('location: ' . SITE_URL . '/publications/listing');
		}
	}
}