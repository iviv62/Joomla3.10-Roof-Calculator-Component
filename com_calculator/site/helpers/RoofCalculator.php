<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
class RoofCalculator { 

    protected $sides;

    // Constructor to initialize the sides
    public function __construct($sides) {
        $this->sides = $sides;
    }

    public function isSymmetrical() {
        return $this->areSidesEqual();
    }

    // Method to check if all sides are equal in length and height
    protected function areSidesEqual() {
        if (count($this->sides) < 2) {
            return true;
        }

        $firstSide = $this->sides[0];
        foreach ($this->sides as $side) {
            if ($side['length'] !== $firstSide['length'] || $side['height'] !== $firstSide['height']) {
                return false;
            }
        }

        return true;
    }
}

