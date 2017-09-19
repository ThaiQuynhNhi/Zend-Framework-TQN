<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
class IndexController extends AbstractActionController {
    
    public function indexAction() {
        /*
        echo '<h3 style="color:red; font-weight:bold">' . __FILE__ . '</h3>';
        */
        
        //// Disable view
        
        // Method 1: return false;
        // Method 2: return '';
        
        
        //// Disable layout

        //$viewModel = new ViewModel();
        //$viewModel -> setTerminal(true);
        //return $viewModel;
        
        
        //// Disable layout & view
        
        // Method 1: 
        //$response = $this->getResponse();
        //return $response;
        // Method 2: 
        //return $this->response;
    }
   
}
