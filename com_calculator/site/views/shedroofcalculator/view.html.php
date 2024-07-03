<?php
defined('_JEXEC') or die;

class CalculatorViewShedRoofCalculator extends JViewLegacy
{
    function display($tpl = null)
    {
        $document = JFactory::getDocument();
        $document->addStyleDeclaration($this->getCSS());
        parent::display($tpl);
    }


    private function getCSS()
    {
        return "
            .form-container {
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .form-title {
                color: #666;
                margin-bottom: 20px;
            }
            .input-group {
                display: inline-block;
                margin-right: 15px;
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                color: #666;
            }
            input[type=\"text\"] {
                width: 100px;
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            .calculate-btn {
                background-color: #cc0000;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 3px;
                cursor: pointer;
            }
             .info-container {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
            .info-container ul {
                list-style-type: none;
                padding-left: 0;
            }
            .info-container li {
                margin-bottom: 5px;
            }
            .info-highlight {
                color: #007bff;
                font-weight: bold;
            }
        ";
    }



}