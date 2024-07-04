<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Make sure to include the Calculator class
require_once JPATH_COMPONENT . '/helpers/RoofCalculator.php';

class GableRoofCalculator extends RoofCalculator {


private function calculateSlopeLength($length, $height) {
    return sqrt(pow($length / 2, 2) + pow($height, 2));
}


private function calculateAsymmetricalArea() {
    $totalArea = 0;
    foreach ($this->sides as $side) {
        $totalArea += $side['length'] * $side['height'];
    }
    return $totalArea;
}

public function calculateArea() {
    if ($this->isSymmetrical()) {
        return $this->calculateAreaFromDimensions();
    } else {
        return $this->calculateAsymmetricalArea();
    }
}

public function calculateAreaFromDimensions() {

    if (empty($this->sides)) {
        throw new Exception("Няма зададени страни за изчисление.");
    }
        
        $L = $this->sides[0]['length'];
        $W = $this->sides[0]['width'];
        $H = $this->sides[0]['height'];

    // Изчисляване на площта на наклонените страни на покрива
    $L_slope = $this->calculateSlopeLength($W, $H);
    $roofArea = 2 * ($L * $L_slope);
    return $roofArea;
}

// Метод за получаване на резултата като низ
public function getResult() {
    $area= 0;
    if ($this->isSymmetrical()) { 
        $area = $this->calculateArea();
        return "Двускатният покрив е симетричен (равни страни). Площ: " . $area . " квадратни единици.";
    } else {
        $area = $this->calculateArea();
        return "Двускатният покрив е асиметричен (неравни страни). Площ: " . $area . " квадратни единици.";
    }
}
}