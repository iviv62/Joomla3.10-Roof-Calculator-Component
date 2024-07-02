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
 * Calculator Component Controller
 *
 * @since  0.0.1
 */
class CalculatorController extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = false)
    {
        $view = $this->input->get('view', 'calculator');
        $this->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }
}