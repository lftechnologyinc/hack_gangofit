<?php

class Admin_Form_LoginForm extends Zend_Form {

    public function init() {
        $this->setName('login_form')
                ->setMethod('post')
                ->setOptions(array('class' => 'form-signin'));


        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email:')
                ->setAttrib('required', true)
                ->addFilter('stringTrim')
                ->setOptions(array('size' => '35', 'class' => 'input-block-level', 'placeholder' => 'Email address'))
                ->addValidator('EmailAddress', true);
        $email->addErrorMessage('invalid email address.');

        $password = new Zend_Form_Element_Password("password");
        $password->setLabel('Password:')
                ->setOptions(array('class' => 'input-block-level', 'placeholder' => 'Password'))
                ->setAttrib('required', true);
        $password->addErrorMessage('password can\'t be empty');

            
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Login')
                ->setOptions(array('class' => 'btn btn-success '));

       
        $this->addElement($email)
                ->addElement($password)
                ->addElement($submit);
    }

}

