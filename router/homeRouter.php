<?php
    $homeController = new HomeController();

    $app->router->get('/', $homeController, 'showHomePage');
    $app->router->get('/home', $homeController, 'showHomePage');
    $app->router->get('/test', $homeController, 'test');