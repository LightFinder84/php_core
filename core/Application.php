<?php
    /**
     * Truong Pham
     */
    class Application{
        
        public Router $router;
        public static $server_name = "phpcore.localtest.me";
        public static $protocol = "http://";
        public static $rootPath = "/home/truong/Documents/github/web_projects/PHP_Core";
        public static Database $database;
        public static Session $session;
        public static $user = null;

        function __construct($config){
            $this->router = new Router();
            self::$database = new Database($config["databases"]);
            self::$session = new Session();

            if($id = self::$session->get('user')){
                static::$user = UserModel::selectOne(where_clause:["logicOperator"=>"none", "conditions"=>[['id', " = ", $id]]]);
            }
        }

        /**
         * Truong Pham
         * return protocol and domain name
         */
        public static function siteURL(){
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $domainName = $_SERVER['HTTP_HOST'];
            return $protocol.$domainName;
        }
        
        public static function isLogined(){
            if(static::$session->get('user') && !is_null(static::$user)){
                return true;
            }
            return false;
        }

        public function run(){
            try {
                $this->router->resolve();
            } catch (Exception $exception) {
                $this->router->setStatusCode($exception->getCode());
                $this->router->render('errors/error',[
                    'exception'=>$exception
                ]);
            }
        }

        /**
         * @param user: associative array
         */
        public static function login($id){
            self::$session->set('user', $id);
        }

        public static function logout(){
            self::$session->remove('user');
        }
        
    }