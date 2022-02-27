<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servers extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "nameNice",
        "nameSlug",
        "serverIp",
        "serverPort",
        "serverPassword",
        "rconIp",
        "rconPort",
        "rconPassword",
    ];

    protected $hidden = [
        "serverPassword",
        "rconPassword",
    ];
}
