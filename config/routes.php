<?php

use Core\Routing\Router;

Router::get('/', [new Up\Controllers\IndexController(), 'indexAction']);
Router::get('/detail/', [new Up\Controllers\DetailController(), 'detailAction']);



