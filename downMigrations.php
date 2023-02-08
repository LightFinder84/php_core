<?php
    http_response_code(200);

    require_once __DIR__."/public/coreAutoLoad.php";

    $env = new DotEnv('./private/.env');
    $env->load();

    
    $config = [];
    $config["databases"] = $_ENV["databases"];

    $app = new Application($config);
    Application::$database->downMigrations();


    
