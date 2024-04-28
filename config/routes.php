<?php

use Core\Routing\Router;

Router::get('/', [new Up\Controllers\IndexController(), 'indexAction']);
Router::get('/detail/', [new Up\Controllers\DetailController(), 'detailAction']);
Router::get('/route/', [new Up\Controllers\MapController(), 'mapAction']);
Router::post('/route/', [new Up\Controllers\MapController(), 'mapAction']);
Router::get('/archive/', [new Up\Controllers\ArchiveController(), 'archiveAction']);

Router::get('/admin/main/', [new Up\Controllers\AdminController(), 'adminAction']);
Router::get('/admin/create/', [new Up\Controllers\AdminController(), 'createAction']);
Router::post('/admin/create/', [new Up\Controllers\AdminController(), 'createAction']);
Router::get('/admin/deleteBuilding/:id/', [new Up\Controllers\AdminController(), 'deleteAction']);
Router::get('/admin/archive/',[new Up\Controllers\AdminController(), 'photoAction']);
Router::post('/admin/archive/',[new Up\Controllers\AdminController(), 'photoAction']);

Router::get('/admin/updateBuilding/:id/', [new Up\Controllers\AdminController(), 'updateAction']);
Router::post('/admin/updateBuilding/:id/', [new Up\Controllers\AdminController(), 'updateAction']);

Router::get('/register/', [new Up\Controllers\UserController(), 'registrationAction']);
Router::get('/login/', [new Up\Controllers\UserController(), 'loginAction']);
Router::post('/register/', [new Up\Controllers\UserController(), 'registrationAction']);
Router::post('/login/', [new Up\Controllers\UserController(), 'loginAction']);





