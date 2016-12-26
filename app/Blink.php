<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blink extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blink';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blink',
    ];

}
