<?php

namespace App\Application\Common\Interfaces;

use Illuminate\Http\Request;

interface IAction
{
    function __invoke(Request $request);
}
