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

// Add CSS file
$document = JFactory::getDocument();

// Or add inline styles
$document->addStyleDeclaration('
.button-container {
  display: flex;
  flex-wrap: wrap;
  gap: 5px; 
}

.roof-option {
  text-align: center;
    align-items: center;
    display: flex;
    flex-direction: column;
    gap: 5px;
  margin: 10px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  background-color: white;
  transition: box-shadow 0.3s ease;
}

.roof-option:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.roof-option img {
  width: 150px;
  height: auto;
}

.roof-option p {
  margin: 10px 0;
  font-size: 18px;
  color: #555;
}

.calculate-btn {
  background-color: #ff2525;  /* Updated to the requested color */
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 5px;
  margin-top: 5px;
  transition: background-color 0.3s ease;
}

.calculate-btn:hover {
  background-color: #e60000;  /* Slightly darker shade for hover effect */
  color:white;
  text-decoration: none;
 
}
');

// Get the module path
$modulePath = JURI::base() . 'modules/mod_yourmodulename/';
?>


<div class="button-container" role="group" aria-label="Calculator Views">
    <?php foreach ($buttons as $button) : ?>
        <?php echo $button; ?>
    <?php endforeach; ?>
</div>