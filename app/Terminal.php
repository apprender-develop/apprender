<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $table = 'terminales';
    protected $fillable = [
        'os', 'os_version', 'browser', 'browser_version', 'device', 'language'
    ];
    protected $dates = ['created_at', 'updated_at'];
}
