<?php
/**
 * @version     2.5.x
 * @package     com_improvemycity
 * @copyright   Copyright (C) 2011 - 2012 URENIO Research Unit. All rights reserved.
 * @license     GNU Affero General Public License version 3 or later; see LICENSE.txt
 * @author      Ioannis Tsampoulatidis for the URENIO Research Unit
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View to edit
 */
class ImprovemycityViewReports extends JView
{
	protected $items;
	protected $pagination;
	protected $state;        
	protected $statistics;        
        
	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
	
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->statistics = $this->get('Statistics');
		$this->pagination = $this->get('Pagination');                

		$canDo = ImprovemycityHelper::getActions();
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display('print');
	}

	/**
	 * Add the page title and toolbar.
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT.DS.'helpers'.DS.'improvemycity.php';
		JToolBarHelper::title(JText::_('COM_IMPROVEMYCITY_REPORT'), 'items.png');
		JToolBarHelper::back('JTOOLBAR_BACK', 'index.php?option=com_improvemycity');
	}

	
}
