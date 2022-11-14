<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brackets extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'game', 'data' , 'name', "teams_id"
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "teams_id" => "array"
    ];

    public function teams()
    {
        return $this->hasMany(Teams::class, "id", "teams_id");
    }
}
