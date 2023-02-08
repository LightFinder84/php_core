<?php
    /**
     * Truong Pham
     */
    require_once __DIR__."/controller.php";

    class HomeController extends Controller{
        
        public function showHomePage (Request $req, Response $res){
            $res->renderUserView('homeView');
        }

        public function test(Request $req, Response $res){
            $bankSqliteModel = new BankSqliteModel($req->getBody());
            print_r($bankSqliteModel->findAll());
        }
    
    }