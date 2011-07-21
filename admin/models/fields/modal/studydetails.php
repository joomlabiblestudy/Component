<?php
/**
 * @version		$Id: studydetails.php 2010-12-22 Based on com_newsfeeds
 * @copyright	Copyright (C) 2007 - 2010 Joomla Bible Study, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports a modal study picker.
 *
 * @package		Joomla Bible Study
 * @subpackage	com_biblestudy
 * @since		7.0
 */
class JFormFieldModal_Studydetails extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Modal_Studydetails';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		
        // Load the modal behavior script.
		JHtml::_('behavior.modal', 'a.modal');
        
        // Load the javascript and css
		JHtml::_('behavior.framework');
		JHTML::_('script','system/modal.js', false, true);
		JHTML::_('stylesheet','system/modal.css', array(), true);

		// Build the script.
		$script = array();
		$script[] = '	function jSelectChart_'.$this->id.'(id, name, object) {';
		$script[] = '		document.id("'.$this->id.'_id").value = id;';
		$script[] = '		document.id("'.$this->id.'_name").value = name;';
		$script[] = '		SqueezeBox.close();';
		$script[] = '	}';

		// Add the script to the document head.
		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

		// Build the script.
		$script = array();
		$script[] = '	window.addEvent("domready", function() {';
		$script[] = '		var div = new Element("div").setStyle("display", "none").injectBefore(document.id("menu-types"));';
		$script[] = '		document.id("menu-types").injectInside(div);';
		$script[] = '		SqueezeBox.initialize();';
		$script[] = '		SqueezeBox.assign($$("input.modal"), {parse:"rel"});';
		$script[] = '	});';

		// Add the script to the document head.
		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));


		// Get the title of the linked chart
		$db = JFactory::getDBO();
		$db->setQuery(
			'SELECT studytitle AS name' .
			' FROM #__bsms_studies' .
			' WHERE id = '.(int) $this->value
		);
		$title = $db->loadResult();

		if ($error = $db->getErrorMsg()) {
			JError::raiseWarning(500, $error);
		}

		if (empty($title)) {
			$title = JText::_('JBS_CMN_SELECT_STUDY');
		}

		$link = 'index.php?option=com_biblestudy&amp;view=studieslist&amp;layout=modal16&amp;tmpl=component&amp;function=jSelectChart_'.$this->id;

		JHTML::_('behavior.modal', 'a.modal');
		$html = "\n".'<div class="fltlft"><input type="text" id="'.$this->id.'_name" value="'.htmlspecialchars($title, ENT_QUOTES, 'UTF-8').'" disabled="disabled" /></div>';
		$html .= '<div class="button2-left"><div class="blank"><a class="modal" title="'.JText::_('JBS_CMN_SELECT_STUDY').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 900, y: 450}}">'.JText::_('JBS_CMN_SELECT_STUDY').'</a></div></div>'."\n";
		// The active study id field.
		if (0 == (int)$this->value) {
			$value = '';
		} else {
			$value = (int)$this->value;
		}

		// class='required' for client side validation
		$class = '';
		if ($this->required) {
			$class = ' class="required modal-value"';
		}

		$html .= '<input type="hidden" id="'.$this->id.'_id"'.$class.' name="'.$this->name.'" value="'.$value.'" />';

		return $html;
	}
}
