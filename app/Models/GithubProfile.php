<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'username',
        'token_id',
        'avatar',
        'followers_count',
        'following_count',
        'bio',
        'email',
        'public_repos_count',
        'link'
    ];


    public function token(){

        return $this->belongsTo(Token::class);
    }
}
