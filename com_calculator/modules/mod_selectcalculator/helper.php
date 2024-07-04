<?php
defined('_JEXEC') or die;

class ModSelectCalculatorHelper
{
    public static function getButtons($params)
    {
        $buttons = array(
            self::createButton('Shed roof calculator', 'index.php?option=com_calculator&view=shedroofcalculator'),
            self::createButton('Calculator 2', 'index.php?option=com_calculator&view=view2'),
            self::createButton('Calculator 3', 'index.php?option=com_calculator&view=view3')
        );
      	
        return $buttons;
    }

    /**
     * Create a button
     *
     * @param   string  $text  The button text
     * @param   string  $link  The button link
     *
     * @return  string  The HTML for the button
     */
    private static function createButton($text, $link)
    {
        return '<a href="' . JRoute::_($link) . '" class="calculator-button me-2 mb-2">' . $text . '</a>';
    }
}