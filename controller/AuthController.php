<?php
    /**
     * Truong Pham
     */
    require_once __DIR__."/controller.php";
    class AuthController extends Controller{

        public function showRegisterPage (Request $req, Response $res){
            $res->setStatusCode(200);
            $res->renderUserView('registerView', []);
        }

        public function register(Request $req, Response $res){
            $queries = $req->getBody();
            $registerForm = new RegisterForm();
            $registerForm->loadData($queries);

            if(!$registerForm->validate()){ //if validate failed
                $res->renderUserView('registerView', [
                    'registerForm' => $registerForm
                ]);
                return;
            } else {
                $userModel = new UserModel($queries);
                $userModel->password = password_hash($queries["password"], PASSWORD_DEFAULT);
                $userModel->save();
                $userTypeModel = ($userModel->roleId == 1) ? new PersonelModel($queries) : new OrganizationModel($queries);
                $userTypeModel->userId = Application::$database->insert_id($userModel::db_name());
                $userTypeModel->save();
                Application::$session->setFlashMessage('message', 'Register successfully');
                $res->redirect("http://localhost/auth/login");
            }
        }

        public function showLoginPage(Request $req, Response $res){
            $res->renderUserView('loginView');
        }

        public function login(Request $req, Response $res){

            $loginForm = new LoginForm();
            $loginForm->loadData($req->getBody());
            if(!$loginForm->validate()){
                $res->setStatusCode(400);
                $res->renderUserView('loginView',[
                    'loginForm' => $loginForm
                ]);
                return;
            }
            if(!$loginForm->login()){
                Application::$session->setFlashMessage('loginAlert', 'Your password is incorrect.');
                $res->redirect('/auth/login');
            } else {
                // save login status of client using session
                Application::login($loginForm->id);
                Application::$session->setFlashMessage('loginSuccess', 'Login successfully.');
                $res->redirect('/');
            }
        }

        public function logout(Request $req, Response $res){
            Application::logout();
            $res->redirect("/auth/login");
        }
    }
