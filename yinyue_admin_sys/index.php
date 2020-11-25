<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Application entry file

// detect PHP environment
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    die('require PHP > 5.3.0 !');
}

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With,token,Accept,Authorization,Origin');

// Turn on the debugging mode. It is recommended to turn on the development stage. The deployment stage comment or set to false
define('APP_DEBUG', true);

// Define application directory
define('APP_PATH', './Application/');

// Bind the module to the current entry file
define('BIND_MODULE', 'Index');

// Import the ThinkPHP entry file
require './ThinkPHP/ThinkPHP.php';


