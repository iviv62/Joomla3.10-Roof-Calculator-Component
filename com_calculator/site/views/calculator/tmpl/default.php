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
  .calculator-button {
    display: inline-block;
    padding: 10px 15px;
    margin: 5px;
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.calculator-button:hover {
    background-color: #0056b3;
}

.calculator-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: left;
    padding: 15px;
    margin: 10px 0;
    background-color: #f8f9fa;
    border-radius: 8px;
}
');

?>


<h1><?php echo $this->msg; ?></h1>

<div class="calculator-container" role="group" aria-label="Calculator Views">
    <?php foreach ($this->buttons as $button) : ?>
        <?php echo $button; ?>
    <?php endforeach; ?>
</div>