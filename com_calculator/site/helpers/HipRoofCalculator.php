<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Make sure to include the Calculator class
require_once JPATH_COMPONENT . '/helpers/RoofCalculator.php';


class HipRoofCalculator extends RoofCalculator  {
   
    // Function to calculate the area of a trapezoid
    private function trapezoidArea($a, $b, $h) {
        return (($a + $b) / 2) * $h;
    }
   
    // Function to calculate the area of a triangle
    private function triangleArea($base, $height) {
        return ($base * $height) / 2;
    }

    // Calculate the roof area    
    public function calculateRoofArea() {
        // Calculating the area of the two trapezoids
        $W= $this->sides[0]['width'];
        $H= $this->sides[0]['height'];
        $L= $this->sides[0]['length'];
        $C = $this->sides[0]['ridge'];

    //calculate triangle height
    $h1 = sqrt(pow($H,2)+ pow(  (($L - $C) / 2), 2));
    
    //find trapezoid side
    $trapezSide = sqrt(pow($h1,2)+ pow( ($W / 2) ,2));

    //calculate trapezoid height
    $h2 = sqrt(pow($trapezSide,2) - pow(  (($L - $C) / 2), 2));

    // Calculate the area of one trapezoidal section
    $areaTrapezoids = 2 * $this->trapezoidArea($L, $C, $h2);

    $areaTriangles =  2 * $this->triangleArea($W, $h1);

    // Since the roof has two identical trapezoidal sections
    $totalArea = $areaTrapezoids + $areaTriangles ;

    return $totalArea;

    }

    public function getResult() {
        
        return "Четирискатния покрив има площ: " . $this->calculateRoofArea() . " квадратни единици.";
       
    }
 
}