<?php

namespace Raw\Controllers;

use Raw\Core\BaseController;
use Raw\Core\Template;

class IndexController extends BaseController
{
    public function index()
    {
        $greetings = 'Hello, World!';
        $message = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $my_list = [
            'rock',
            'paper',
            'scissors',
            'thunder',
            'dinosaur'
        ];

        return Template::render('demo/index.amarisse',
            compact(
                'greetings',
                'message',
                'my_list'
            )
        );
    }

    public function demo_form()
    {
        return Template::render('demo/form.amarisse');
    }

    public function demo_save_form()
    {
        $email = $this->post('email');

        if (!empty($email))
        {
            return Template::render('demo/thankyou.amarisse', compact('email'));
        }

        return Template::render('demo/thankyou.amarisse');
    }
}