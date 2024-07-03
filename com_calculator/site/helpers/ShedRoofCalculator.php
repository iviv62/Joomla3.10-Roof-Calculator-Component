<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Make sure to include the Calculator class
require_once JPATH_COMPONENT . '/helpers/RoofCalculator.php';

class ShedRoofCalculator extends RoofCalculator  {
   

    // Calculate the roof area
    public function calculateRoofArea() {
        $rafterLength = $this->calculateRafterLength();
        return $rafterLength * $this->sides[0]['length'];;
    }

    // Calculate the length of the rafters
    public function calculateRafterLength() {
        $W=$this->sides[0]['width'];
        $H=$this->sides[0]['height'];
        return sqrt(pow($W, 2) + pow($H, 2));
    }

    public function getResult() {
        try {
            $area = $this->calculateRoofArea();
            return "Едноскатният покрив има площ: " . number_format($area, 2) . " квадратни единици.";
        } catch (Exception $e) {
            return "Грешка при изчислението: " . $e->getMessage();
        }
       
    }
 
}