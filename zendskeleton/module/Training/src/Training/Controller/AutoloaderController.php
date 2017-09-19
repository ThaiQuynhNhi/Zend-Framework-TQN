<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Database;
class AutoloaderController extends AbstractActionController {
    /******************* Autoloader Standard ********************/
    public function Index01Action() {
        
        /*
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
        
        $autoloader = new \Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        // đăng kí namespace
        $autoloader -> registerNamespace('Database', LIBRARY_PATH . '\Database');
        // đăng kí Mail
        $autoloader -> registerPrefix('Mail', LIBRARY_PATH . '\Mail');
        $autoloader -> register();
       
        
        $student = new \Database\Student();
        $teacher = new \Database\Teacher();
        $worker = new \Database\Oracle\Worker();
        
        $sender = new \Mail_Sender();
        $attache = new \Mail_Attache();
        
        $sender2 = new \Mail_Abc_Sender();
        return false;
        */
    }
    /******************** Cách viết khác ngắn gọn hơn của autoload *********************/
    public function Index02Action() {
    
        /*
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
    
        $autoloader = new \Zend\Loader\StandardAutoloader(array(
            'autoregister_zf' => true, 
            
            // Phần sử dụng namespace
            'namespaces'    => array(
                'Database' => LIBRARY_PATH . '/Database',
                'File'     => LIBRARY_PATH . '/File',
            ),
            
            // Phần ko sử dụng namespace
            'prefixes'  => array(
                'Mail'  => LIBRARY_PATH . '/Mail',
            ), 
 
        ));
        $autoloader -> register();
         
    
        $student = new \Database\Student();
        $teacher = new \Database\Teacher();
        $worker  = new \Database\Oracle\Worker();
    
        $sender  = new \Mail_Sender();
        $attache = new \Mail_Attache();
        $sender2 = new \Mail_Abc_Sender();
        
        $upload  = new \File\Upload();
        
        return false;
        */
    }

    public function Index03Action() {
        /*
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
        
        \Zend\Loader\AutoloaderFactory::factory(array(
            '\Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true,
                
                // Phần sử dụng namespace
                'namespaces'      => array(
                    'Database'    => LIBRARY_PATH . '/Database',
                    'File'        => LIBRARY_PATH . '/File',
                ),
                
                // Phần ko sử dụng namespace
                'prefixes'        => array(
                    'Mail'        => LIBRARY_PATH . '/Mail',
                ),
            ),
            
        ));
         
        
        $student = new \Database\Student();
        $teacher = new \Database\Teacher();
        $worker  = new \Database\Oracle\Worker();
        
        $sender  = new \Mail_Sender();
        $attache = new \Mail_Attache();
        $sender2 = new \Mail_Abc_Sender();
        
        $upload  = new \File\Upload();
        
        return false;
        */
    }

    
    /******************* Autoloader Classmap ********************/
    public function Index04Action() {
        /*
    }
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
        
        $autoloader = new \Zend\Loader\ClassMapAutoloader();
        $autoloader -> registerAutoloadMap(LIBRARY_PATH . '/autoloader/autoloader_classmap.php');
        $autoloader -> register();
        
        $student = new \Database\Student();
        $teacher = new \Database\Teacher();
        $worker  = new \Database\Oracle\Worker();
        $sender2 = new \Mail_Abc_Sender();
        
        return false;
        */
    }
    
    
    /******************* Các viết khác của Classmap ********************/
    public function Index05Action() {
        /*
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
        
        $autoloader = new \Zend\Loader\ClassMapAutoloader(
            array(
                LIBRARY_PATH . '/autoloader/autoloader_classmap.php'
            ));
        
        $autoloader -> register();
        
        $student = new \Database\Student();
        $teacher = new \Database\Teacher();
        $worker  = new \Database\Oracle\Worker();
        $sender2 = new \Mail_Abc_Sender();
        $upload  = new \File\Upload();
        
        return false;
        */
    }
    
    public function Index06Action() {
        /*
        echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
    
        \Zend\Loader\AutoloaderFactory::factory(array(
            '\Zend\Loader\ClassMapAutoloader' => array(
                    LIBRARY_PATH . '/autoloader/autoloader_classmap.php'
            )
         ));

    
        //$autoloader -> register();
    
        $student = new \Database\Student();
        $teacher = new \Database\Teacher();
        $worker  = new \Database\Oracle\Worker();
        $sender2 = new \Mail_Abc_Sender();
        $upload  = new \File\Upload();
    
        return false;
        */
    }
    
    /************ Sử dụng cả hai loại Autoloader *************/
    public function Index07Action() {
        
         echo '<h3 style="color:red; font-weight:bold">' . __METHOD__ . '</h3>';
    
         \Zend\Loader\AutoloaderFactory::factory(array(
             
            '\Zend\Loader\ClassMapAutoloader' => array(
                LIBRARY_PATH . '/autoloader/autoloader_classmap.php'
            ),
             
            '\Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true,
             
                // Phần sử dụng namespace
                'namespaces'      => array(
                    'Database'    => LIBRARY_PATH . '/Database',
                    'File'        => LIBRARY_PATH . '/File',
                ),
             
                // Phần ko sử dụng namespace
                'prefixes'        => array(
                    'Mail'        => LIBRARY_PATH . '/Mail',
                ),
            ),
            
         ));
    
    
         //$autoloader -> register();
    
         $student = new \Database\Student();
         $teacher = new \Database\Teacher();
         $worker  = new \Database\Oracle\Worker();
         $sender2 = new \Mail_Abc_Sender();
         $upload  = new \File\Upload();
    
         return false;
         
    }
}
