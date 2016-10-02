<?php

/**
 * Setting Router (url) to render->twig with Controllers Methods!!
 */

//Setting Router for HomeController with Index() Method!!!
$app->get('/', ['\App\Controllers\HomeController', 'index']);
