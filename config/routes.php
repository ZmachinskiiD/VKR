<?php

use Core\Routing\Router;

Router::get('/', [new Up\Controllers\IndexController(), 'indexAction']);
Router::get('/detail/:id/', [new Up\Controllers\DetailController(), 'detailAction']);
Router::post('/detail/:id/', [new Up\Controllers\DetailController(), 'CommentAction']);
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

Router::post('/technical/', [new Up\Controllers\UserController(), 'logoutAction']);
Router::post('/addToFeatured/', [new Up\Controllers\UserController(), 'featuredAction']);
Router::post('/deleteFromFeatured/', [new Up\Controllers\UserController(), 'deleteFeaturedAction']);
Router::post('/deleteComment/', [new Up\Controllers\UserController(), 'deleteCommentAction']);
Router::post('/deletePhoto/', [new Up\Controllers\AdminController(), 'deletePhoto']);
Router::post('/changePhoto/', [new Up\Controllers\AdminController(), 'changePhoto']);
Router::post('/checkemail/', [new Up\Controllers\UserController(), 'checkEmailAction']);
Router::post('/admin/changePhoto/', [new Up\Controllers\AdminController(), 'changePhotoAction']);
Router::post('/admin/deletePhoto/', [new Up\Controllers\AdminController(), 'deletePhotoAction']);






