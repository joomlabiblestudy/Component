<?php

/**
 * @version     $Id: shareedit.php 1466 2011-01-31 23:13:03Z bcordis $
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();

    jimport('joomla.application.component.controllerform');

    abstract class controllerClass extends JControllerForm {

    }


class biblestudyControllershareedit extends controllerClass
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	 protected $view_list = 'sharelist';
	 
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
	//	$this->registerTask( 'add'  , 	'edit' );
	}

	
}
?>