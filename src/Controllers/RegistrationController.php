<?php

namespace Raw\Controllers;

use Raw\Core\BaseController;
use Raw\Core\Template;
use Raw\Model\User;

class RegistrationController extends BaseController
{
    public function index()
    {
        return Template::render('registration/index.amarisse');
    }

    public function register()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        if (!empty($username) && !empty($password))
        {
            $user = new User($username, $password);
            $result = $user->create();
            if ($result === true) {
                return Template::render('registration/thankyou.amarisse', compact('username'));
            } else {
                $error = $result;
                return Template::render('registration/thankyou.amarisse', compact('error'));
            }
        }

        $error_message = 'Username or password cannot be empty.';
        return Template::render('registration/thankyou.amarisse', compact('error_message'));
    }
}