<?php
defined('_JEXEC') or die;

class CalculatorViewShedRoofCalculator extends JViewLegacy
{
    function display($tpl = null)
    {
        $this->msg = 'This is View for shed roof calculator';
        parent::display($tpl);
    }
}