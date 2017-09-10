<?php

namespace Training;

class Module {
    
    // Thông thường có 3 phuong thức cơ bản:
    // 
    /*
    public function onBoottrap(){}
    */
    
    // đọc cấu hình của module
    public function getConfig() {
        
        
        /******************** INI *********************/
        // Đọc tập tin INI cho các phương thức khi chưa được tách ra
            /*
            $reader = new \Zend\Config\Reader\Ini();
            $reader -> setNestSeparator('.');
            $configArray = $reader -> fromFile(__DIR__ . '/config/module.config.ini');
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($configArray);
            echo '</pre>';
            */
        
        
        // Đọc tập tin INI cho các phương thức khi đã được tách ra làm 2 (router riêng, controller và view riêng)
            /*
            $reader = new \Zend\Config\Reader\Ini();
            $reader -> setNestSeparator('.');
            
            $configRouter = $reader -> fromFile(__DIR__ . '/config/ini/router.ini');
            
            $configController_View = include __DIR__. '/config/ini/controller-view.php';
            
            $configArray = array_merge($configRouter, $configController_View);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($configArray);
            echo '</pre>';
            */
        
        
        // Đọc tập tin INI cho các phương thức khi đã được tách nhỏ ra (trong 1 router tách ra nhiều thành phần)
        // Chỉ kéo ở file .ini thôi
            /*
            $reader = new \Zend\Config\Reader\Ini();
            $reader -> setNestSeparator('.');
            
            $configRouter = $reader -> fromFile(__DIR__ . '/config/ini/router.ini');
            
            $configController_View = include __DIR__. '/config/ini/controller-view.php';
            
            $configArray = array_merge($configRouter, $configController_View);
            
            echo '<pre style="color:red; font-weight:bold">';
            print_r ($configArray);
            echo '</pre>';
            */
        
        
        /******************** XML *********************/
        
        $reader = new \Zend\Config\Reader\Xml();
        $configArray = $reader -> fromFile(__DIR__ . '/config/module.config.xml');
        
        
        foreach ($configArray['controller']['invokables'] as $key => $value)
        {
            $newKey = preg_replace('#Controller$#', '', $value);
            $configArray['controller']['invokables'][$newKey] = $value;
            unset($configArray['controller']['invokables'][$key]);
        }
        
        $configArray['view_manager']['template_path_stack'] = __DIR__ . '/view';
        
        
        echo '<pre style="color:red; font-weight:bold">';
        print_r ($configArray);
        echo '</pre>';
        
        
        //return $configArray; 
        //return include 'config/module.config.php';
        return include __DIR__ . '/config/module.config.php';
    }
    
    // tự động load các controller cho chúng ta
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
        
}
