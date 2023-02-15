<?php
    $config = [];
    $crm = [
        "name" => "crm", 
        "host"=>"localhost", 
        "username"=>"crm_user", 
        "password"=>"crm_user",
        "type"=>"mysql"
    ];
    $product = [
        "type"=>"sqlite",
        "name"=>"product",
        "location"=>"/database/product.db"
    ];
    $sharing = [
        "type"=>"sqlite",
        "name"=>"sharing",
        "location"=>"/database/sharing.db"
    ];
    $migrations = [
        "type"=>"sqlite",
        "name"=>"migrations",
        "location"=>"/database/migrations.db"
    ];
    $config["databases"] = [];
    $config["server_name"] = "phpcore.localtest.me";
    $config["root_path"] = "/home/truong/Documents/github/web_projects/php_core";
    
    $config = json_encode($config);
    $envFile = fopen("./private/.env", "w") or die("Unable to open .env file.");
    fwrite($envFile, $config);
    fclose($envFile);
?>