<?php

namespace App\Application\Authentication\Consts;

class ScopeConsts
{
    public const roleScopes = [
        "none" => [],
        "admin" => ["*"]
    ];

    public const allScopes = [];
}
