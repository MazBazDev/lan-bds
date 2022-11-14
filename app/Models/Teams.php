<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teams extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prefix',
        'game',
        "badge",
        'mates',
        'active',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
        "mates" => "array"
    ];

    public function players()
    {
        return $this->hasMany(User::class, "id", "mates");
    }

    // public function mates()
    // {   
    //     $users = [];

    //     foreach ($this->mates as $id) {
    //         $user = User::find($id);
    //         $temp = (object) [
    //             "id" => $user->id,
    //             'name' => $user->name,
    //             'pseudo' => $user->pseudo,
    //             "picture" => $user->picture
    //         ];
    //         array_push($users, $temp);
    //     }

    //     return $users;
    // }
}
