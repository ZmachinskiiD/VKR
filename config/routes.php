<?php

use Core\Routing\Router;

Router::get('/', [new Up\Controllers\IndexController(), 'indexAction']);
Router::get('/detail/', [new Up\Controllers\DetailController(), 'detailAction']);
Router::get('/route/', [new Up\Controllers\RouteController(), 'routeAction']);
Router::get('/archive/',[new Up\Controllers\ArchiveController(),'archiveAction']);


