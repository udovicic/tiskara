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
		$publications = $this->Publication->selectAll();

		$this->set('title', 'Izlistanje izdanja');
		$this->set('publications', $publications);
	}

/**
 * Edit publication details
 */
	function edit($id='')
	{
		$publication = $this->Publication->select($id);

		$this->renderHeader = false;
		$this->set('pub', $publication);
	}

/**
 * Remove publication entry
 */
	function delete($id)
	{
		$publication = $this->Publication->select($id);

		$this->renderHeader = false;
		$this->set('pub', $publication);
	}

/**
 * Add new publication
 */
	function add()
	{
		$this->renderHeader = false;
	}
}