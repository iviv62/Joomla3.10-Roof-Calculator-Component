<?php
defined('_JEXEC') or die;


// Make sure to include the Calculator class
require_once JPATH_COMPONENT . '/helpers/HipRoofCalculator.php';

class CalculatorControllerHipRoofCalculator extends JControllerLegacy
{
    public function calculate()
    {
        // Check for request forgeries
        try {
            // Turn off error reporting to prevent HTML output
            error_reporting(0);
            ini_set('display_errors', 0);
    
            JSession::checkToken() or $this->sendJsonResponse(false, 'Invalid Token');
    
            $app = JFactory::getApplication();
            $input = $app->input;
            
            //Input validation could be separated in a function
            $length = $input->get('length', 0, 'float');
            $width = $input->get('width', 0, 'float');
            $height = $input->get('height', 0, 'float');
            $ridge = $input->get('ridge', 0, 'float');

             // Check if inputs are positive real numbers
            if (!$this->isPositiveRealNumber($length) ||
            !$this->isPositiveRealNumber($width) ||
            !$this->isPositiveRealNumber($ridge) ||
            !$this->isPositiveRealNumber($height)) {
            throw new Exception('Всички въведени данни трябва да са положителни числа.');
        }
    
            // Instantiate your calculator
            $sides = [
                [
                    'length' => $length,          
                    'width' => $width,            
                    'height' => $height,
                    'ridge' => $ridge,             
                ]             
            ];

            $calculator = new HipRoofCalculator($sides);
    
            $result = $calculator->getResult();
    
            $this->sendJsonResponse(true, $result);
        } catch (Exception $e) {
            $this->sendJsonResponse(false, 'Внимание: ' . $e->getMessage());
        }
    }

    private function sendJsonResponse($success, $message)
    {
        $app = JFactory::getApplication();
        $response = array(
            'success' => $success,
            'message' => $message
        );
        
        $app->setHeader('Content-Type', 'application/json');
        echo json_encode($response);
        $app->close();
    }


    // Helper method to check if a number is a positive real number
    private function isPositiveRealNumber($number)
    {
        return is_numeric($number) && $number > 0 && is_finite($number);
    }
}