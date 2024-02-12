<?php

use Core\Routing\Router;

Router::get('/', [new Up\Controllers\IndexController(), 'indexAction']);



