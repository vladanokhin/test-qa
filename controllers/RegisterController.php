<?php

namespace Controllers;

use Core\Request\Request;

class RegisterController
{

    public function show(Request $request)
    {
        dump("Sign up page ;)");
        dump($request->data());
    }

}