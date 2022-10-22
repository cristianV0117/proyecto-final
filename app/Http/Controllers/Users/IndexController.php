<?php

namespace App\Http\Controllers\Users;

final class IndexController
{
    public function __invoke()
    {
        return view('Users/index');
    }
}
