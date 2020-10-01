<?php

namespace App\Api\Http\Controllers;

use App\Application\Authentication\Actions\VerifyAccountAction;
use App\Application\User\Actions\GetDetailsAction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function details(Request $request)
    {
        return (new GetDetailsAction())($request);
    }
}
