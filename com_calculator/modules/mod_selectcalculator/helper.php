<?php
defined('_JEXEC') or die;

class ModSelectCalculatorHelper
{
    public static function getButtons($params)
    {

        $modulePath = JURI::base() . 'modules/mod_selectcalculator/images/';

        $buttons = array(
            self::createButton('Едноскатен покрив', 'index.php?option=com_calculator&view=shedroofcalculator',$modulePath."shed-roof.png" ),
            self::createButton('Двускатен Покрив', 'index.php?option=com_calculator&view=gableroofcalculator',$modulePath."gable-roof.png" ),
            self::createButton('Четирискатен Покрив', 'index.php?option=com_calculator&view=hiproofcalculator',$modulePath."hipped-roof.png" )
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
    private static function createButton($text, $link, $img)
    {
        return '
        
        <div class="roof-option">
            <img src="'.$img.'" alt="'.$text.'">
            <p>'.$text.'</p>
            <a href="' . JRoute::_($link) . '" class="calculate-btn">' . $text . '</a>
        </div>
        ';
    }
}