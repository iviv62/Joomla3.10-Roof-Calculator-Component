<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_calculator
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the Calculator Component
 *
 * @since  0.0.1
 */
class CalculatorViewCalculator extends JViewLegacy
{
	/**
	 * Display the Calculator view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Assign data to the view
		$this->msg = 'Hello Calculator2';


		// Create buttons
        $this->buttons = array(
            $this->createButton('Shed roof calculator', 'index.php?option=com_calculator&view=shedroofcalculator'),
            $this->createButton('Calculator 2', 'index.php?option=com_calculator&view=view2'),
            $this->createButton('Calculator 3', 'index.php?option=com_calculator&view=view3')
        );

		// Display the view
		parent::display($tpl);
	}

	    /**
     * Create a button
     *
     * @param   string  $text  The button text
     * @param   string  $link  The button link
     *
     * @return  string  The HTML for the button
     */
    private function createButton($text, $link)
    {
        return '<a href="' . JRoute::_($link) . '" class="calculator-button  me-2 mb-2">' . $text . '</a>';
    }
}