<?php
defined('_JEXEC') or die;

class CalculatorControllerShedRoofCalculator extends JControllerLegacy
{
    public function calculate()
    {
        // Check for request forgeries
        JSession::checkToken() or $this->sendJsonResponse(false, 'Invalid Token');

        $app = JFactory::getApplication();
        $input = $app->input;

        $length = $input->get('length', 0, 'float');
        $width = $input->get('width', 0, 'float');
        $height = $input->get('height', 0, 'float');

        // Perform your calculation here
        $result = $length * $width * $height;

        $this->sendJsonResponse(true, "The result is: " . $result);
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
}