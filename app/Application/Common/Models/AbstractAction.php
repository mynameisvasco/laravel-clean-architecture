<?php

namespace App\Application\Common\Models;

use App\Application\Common\Interfaces\IAction;
use Illuminate\Http\Request;

abstract class AbstractAction implements IAction
{
    abstract public function __invoke(Request $request);

    abstract protected function validate(Request $request);
}
