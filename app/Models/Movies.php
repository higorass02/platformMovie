<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = 'movie';
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'summary',
        'ordination',
        'status',
        'id_course',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function course()
    {
        return $this->hasMany(Courses::class, 'id', 'id_course')->where('status', 1);
    }
}
