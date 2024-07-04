<?php
defined('_JEXEC') or die;


$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Load the CSS file
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_shedcalculator/css/style.css');

require JModuleHelper::getLayoutPath('mod_shedcalculator', $params->get('layout', 'default'));