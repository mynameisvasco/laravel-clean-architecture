<?php

namespace App\Application\User\Actions;

use App\Application\Common\Models\AbstractAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetDetailsAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        return response()->json(Auth::user(), 403);
    }

    protected function validate(Request $request)
    {
    }
}
