<?php

namespace Training\Controller;

use Zend\Config\Processor\Filter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Config\Config as ZCConfig;
class ConfigController extends AbstractActionController {
    
    
    /*************** CẤU HÌNH ZEND CONFIG ***************/
    
    public function indexAction() {
        
        echo '<h3 style="color:red; font-weight:bold">' . __FILE__ . '</h3>';
        
        /*************** DISABLE VIEW/LAYOUT ***************/
        
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
        
        
            $configArray = array
            (
                'website' => 'www.zend.vn.com',
                
                'account' => array
                (
                    'email'    => '<h3>zend2@zend.vn</h3>',
                    'password' => '123456',
                    'tittle'   => 'zendconfig',
                    'content'  => 'training zend config',
                    'port'     => 465,
                ),
            ); 
            
        
        echo '<br>';
        
        /*************** xxx ****************/
        
        echo '01: Chuyển từ một mảng Array thành một đối tượng config của zend config';
        
        echo '<br>';
        
            $config = new ZCConfig($configArray, true);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($config);
            echo '</pre>';
            
            echo '<br>' . $config -> website;
            
            echo '<br><br>' . $config -> account -> get("port");
        
        echo '<br><br>';
        
        /*************** xxx ****************/
        echo '02: Chuyển từ một file config thành một đối tượng config của zend config';
        
        echo '<br>';
        
            $config = new \Zend\Config\Config(include __DIR__ . '/../../../config/module.config.php');
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($config);
            echo '</pre>';
        
        echo '<br><br>';
        
        /*************** xxx ****************/
        
        echo '03: Zend/Config/Processor thực hiện một số hành động trên đối tượng Zend/Config/Config';
        echo '<br>';
        
        // đưa giá trị vào hằng số
            define('MYCONST', 'This is a constant');
            $config = new \Zend\Config\Config(array('const'=> 'MYCONST'), true);
        
        //////// Lớp \Zend\Config\Processor\Constant()
            $processor = new \Zend\Config\Processor\Constant();
            $processor -> process($config);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($config);
            echo '</pre>';
        
        // Ghi chú: muốn thay đổi các giá trị thì đưa $config (, true) vào true - lỗi read-only
        
        //////// Lớp \Zend\Config\Processor\Filter()
            $filter = new \Zend\Filter\StringToUpper(); // chuyển chuỗi thường thành in Hoa
            $processor = new \Zend\Config\Processor\Filter($filter);
            
            $processor -> process($config);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($config);
            echo '</pre>';
        
        //////// Lớp \Zend\Config\Processor\Queue() : hàng đợi (dùng nhiều filter trong processor thì sử dụng queue)
        //////// Insert theo FIFO
            $config = new \Zend\Config\Config($configArray, true);
            $filterUpper = $filter = new \Zend\Filter\StringToUpper();
            $filterStripTags = $filter = new \Zend\Filter\StripTags();
            
            $processorUpper = new \Zend\Config\Processor\Filter($filterUpper);
            $processorStripTags = new \Zend\Config\Processor\Filter($filterStripTags);
            
            $queue = new \Zend\Config\Processor\Queue();
            $queue -> insert($processorUpper);
            $queue -> insert($processorStripTags);
            
            $processor -> process($config);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($config);
            echo '</pre>';
       
        //////// Lớp \Zend\Config\Processor\Token()
        
            $config = new \Zend\Config\Config(array('token'=>'token values: TOKEN'), true);
            $processor = new \Zend\Config\Processor\Token();
            
           
            $processor->addToken('TOKE', 'Hello');
            
            // cú pháp để thực hiện
            $processor -> process($config);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($config);
            echo '</pre>';
            
            
        return false;
    }
    
    
    /**************** CẤU HÌNH FILE INI *****************/
    
    public function index2Action(){
        
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
        
        ///// Đọc file dữ liệu từ INI
            /*
            $reader = new \Zend\Config\Reader\Ini();
            
            $reader->setNestSeparator('-'); // ngăn cách giữa parent và child
            
            $data = $reader->fromFile(__DIR__ . '/../../../config/ini/module.config.ini');
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($data);
            echo '</pre>';
            */
        
        ///// Ghi ra file INI (hay tạo file INI)
            /*
            $config = new \Zend\Config\Config(array(), true);
            $config -> production          = array();
            $config -> production->website = 'www.zend.vn.com';
            
            $config -> production->account           = array();
            $config -> production->account->email    = 'zend2@zend.vn';
            $config -> production->account->password = '123456';
            $config -> production->account->title    = 'zendconfig';
            $config -> production->account->content  = 'training zend config';
            $config -> production->account->port     = 465;
            
            $writer = new \Zend\Config\Writer\Ini();
            
            $writer->setNestSeparator('-');
            
            $writer -> toFile(__DIR__ . '/../../../config/ini/module.config2.ini', $config);
            */
        
        //return false;
        
    }


    /**************** CẤU HÌNH FILE XML *****************/
    public function index3Action(){
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
        
        /********** Đọc file XML ***********/
            /*
            $reader = new \Zend\Config\Reader\Xml();
            $data = $reader -> fromFile(__DIR__ . '/../../../config/xml/config.xml');
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($data);
            echo '</pre>';
            */
        
        /********* Ghi ra file XML **********/
        $config = new \Zend\Config\Config(array(), true);
        $config -> production          = array();
        $config -> production->website = 'www.zend.vn.com';
        
        $config -> production->account           = array();
        $config -> production->account->email    = 'zend2@zend.vn';
        $config -> production->account->password = '123456';
        $config -> production->account->title    = 'zendconfig';
        $config -> production->account->content  = 'training zend config';
        $config -> production->account->port     = 465;
        
        $writer = new \Zend\Config\Writer\Xml();
        $writer -> toFile(__DIR__ . '/../../../config/xml/config2.xml', $config);
        
        return false;
    }
}

    
