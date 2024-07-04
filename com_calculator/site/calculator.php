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




$controller = JControllerLegacy::getInstance('Calculator');
$controller->execute(JFactory::getApplication()->input->get('task', 'display'));
$controller->redirect();