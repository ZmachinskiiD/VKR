<?php


return [
    'SITE_ELEMENTS' => \Up\Services\HttpService::getMyUrl() .'/assets/objects/technical/',
    'BUILDING_IMAGES'=>\Up\Services\HttpService::getMyUrl() .'/assets/objects/BuildingImages/',
	'ALLOWED_FILES' => ['image/gif', 'image/png', 'image/jpeg', 'image/jpg', 'image/svg', 'image/webp'],
	'BUILDINGS_IDS'=>[10,32]
];