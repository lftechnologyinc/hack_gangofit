<?php

class Admin_AuthController extends Custom_Action {

    public $userTable;
    public $tableName;

    public function init() {
        $this->userTable = new Admin_Model_User();
        $this->tableName = $this->userTable->_name;
    }

    
    public function signin($credentials) {
        $databaseAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($databaseAdapter, $this->tableName, 'email', 'password', 'MD5(?)');
        $authAdapter->setIdentity($credentials['email']);
        $authAdapter->setCredential($credentials['password']);
        $authentication = Zend_Auth::getInstance();
        $result = $authentication->authenticate($authAdapter);

        if ($result->isValid()) {
            $session = $authAdapter->getResultRowObject(array('iduser', 'email', 'name', 'profile_pic', 'role_id'));
            $this->addMessages('sucessfully logged in');
            $authentication->getStorage()->write($session);
            $this->_redirect('admin/index/index');
        } else {
            $this->addMessages('error occured', 'error');
            echo 'error';
            die;
        }
    }

    public function loginAction() {
        
        $form = new Admin_Form_LoginForm();
//        echo '<pre>';
//        print_r($form);
//        die;
        $this->view->login = $form;
        //echo 'test';die?;
        if ($this->getRequest()->isPost()) {
            echo 'i am inside post';die;
            $postdata = $this->getRequest()->getPost();

            if ($form->isValid($postdata)) {

                $this->signin($postdata);
            }
        }
    }

    public function logoutAction() {
        $authenctication = Zend_Auth::getInstance();
        if ($authenctication->hasIdentity()) {
            $authenctication->clearIdentity();
            $this->_redirect('admin/auth/login');
        }
    }

    public function checkAction() {
        $this->_helper->layout->disableLayout();
        $userTable = new Admin_Model_User();
        if ($this->getRequest()->isPost()) {
            $email = $this->getRequest()->getParam('e');
            $result = $userTable->checkEmail($email);
            echo Zend_Json_Encoder::encode($result);
            die;
        }
    }

    public function registerAction() {
        // echo 'i am into register action';die;
        $registerForm = new Admin_Form_RegisterForm();
//        echo '<pre>';
//        print_r($registerForm);die;
       
        if ($this->getRequest()->isPost() && $registerForm->image->receive()) {
            if ($registerForm->image->isUploaded()) {
                $postData = $this->getRequest()->getPost();

                if ($registerForm->isValid($postData)) {

                    $values = $registerForm->getValues();
                    $loginCredential['email'] = $postData['email'];
                    $loginCredential['password'] = $postData['password'];
                    $userInfo['name'] = $postData['name'];
                    $userInfo['email'] = $postData['email'];
                    $userInfo['password'] = md5($postData['password']);
                    $userInfo['address'] = $postData['address'];
                    $userInfo['role_id'] = '3';
                    $userInfo['profile_pic'] = $values['image'];


                    //needed for generating csv files                     
                    $csv = new Custom_Csv();
                    $arr[0] = $userInfo;
                    $csv->direct($arr, ',', 'testCSV');
                    
                    
                    
//                    echo '<pre>';
//                    print_r($userInfo);die;     


                    $check = $this->userTable->registerUser($userInfo);
                    if ($check) {
                        $this->_helper->flashMessenger->clearMessages();
                        $this->_helper->flashMessenger->addMessage('Welcome ' . ' ' . $postData['name']);
                        $this->signin($loginCredential);
                        //$this->_redirect('admin/index/index');
                    } else {
                        $this->_helper->flashMessenger->clearMessages();
                        $this->_helper->flashMessenger->addMessage('error occured please try again!!');
                        $this->_redirect('admin/auth/login');
                    }
                }
            }
        }
        $this->view->form = $registerForm;
    }
    
    public function partialTestAction()
    {
        $this->view->partialCounter=1;
        $this->view->Id=5;
        $this->view->FirstName='naresh';
        $this->view->LastName='maharjan';
    }
}

?>
