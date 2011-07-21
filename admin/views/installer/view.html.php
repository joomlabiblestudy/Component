<?php

/**
 * @version     $Id: view.html.php 1466 2011-01-31 23:13:03Z bcordis $
 * @package     com_biblestudy
 * @license     GNU/GPL
 */
//No Direct Access
defined('_JEXEC') or die();
require_once (JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_biblestudy' . DS . 'lib' . DS . 'biblestudy.defines.php');
require_once (JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_biblestudy' . DS . 'helpers' . DS . 'biblestudy.php');
jimport('joomla.application.component.view');

class biblestudyViewInstaller extends JView {

    protected $items;
    protected $pagination;
    protected $state;

    function display($tpl = null) {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        $this->types = $this->get('Types');
        $this->canDo = BibleStudyHelper::getActions('', 'templateedit');
        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar() {
        JToolBarHelper::title(JText::_('JBS_EXTENSIONS'), 'templates.png');
        JToolBarHelper::preferences('com_installer');
    }

}

?>