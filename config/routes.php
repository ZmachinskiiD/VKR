<?php

use Core\Routing\Router;

Router::get('/', [new Up\Controllers\IndexController(), 'indexAction']);
Router::get('/detail/', [new Up\Controllers\DetailController(), 'detailAction']);
Router::get('/route/', [new Up\Controllers\MapController(), 'mapAction']);
Router::post('/route/', [new Up\Controllers\MapController(), 'mapAction']);



