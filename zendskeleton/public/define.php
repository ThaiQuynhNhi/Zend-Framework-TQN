<?php
    // Định nghĩa phần đường dãn hiện thời
    chdir(dirname(__DIR__));
    
    // Định nghĩa biến môi trường
    define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production')); // production
    
    // Hằng số lưu đường dẫn thư mục ứng dụng
    define('APPLICATION_PATH', realpath(dirname(__DIR__)));
    
    // Hằng số lưu đường dẫn thư mục chứa thư viện ZF2
    define('LIBRARY_PATH', APPLICATION_PATH . '\vendor');
    