<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerTransfer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "funcomId",
        "from",
        "to",
        "payload"
    ];

    protected $hidden = [
        "payload",
    ];

}
