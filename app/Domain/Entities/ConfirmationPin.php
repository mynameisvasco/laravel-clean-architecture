<?php

namespace App\Domain\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Entities\ConfirmationPin
 *
 * @property-read \App\Domain\Entities\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationPin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationPin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConfirmationPin query()
 * @mixin \Eloquent
 */
class ConfirmationPin extends Model
{
    use HasFactory;

    protected $fillable = [
        "pin",
        "expires_at",
        "user_id"
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
