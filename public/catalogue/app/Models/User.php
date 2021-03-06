<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Auth;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pseudo',
        'email',
        'password',
        'name',
        'firstname',
        'birthday',
        'code_role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function getUsers() {
        return User::all();
    }

    public static function getUserInfos($pseudo) {
        return User::where('pseudo','=', $pseudo)->first();
    }

    public static function createOrUpdateUser($user) {
        return User::updateOrCreate($user);
    }

    public static function isAdmin() {
        if(Auth::check())
        {
            $pseudo = Auth::user()->pseudo;
        }else
        {
            return false;
        }

        return User::where('pseudo', '=' , $pseudo)->where('code_role', '=' , 1)->first();
    }

    public static function isBlocked() {
        if(Auth::check())
        {
            $pseudo = Auth::user()->pseudo;
        }else
        {
            return false;
        }

        $user = User::where('pseudo', '=' , $pseudo)->where('code_role', '=' , 2)->first();
        return !empty($user);
    }

    public function getRoleInfos()
    {
        return $this->belongsTo(KeyValue::class,'code_role', 'code')->where('type', '=', 'role');
    }

}
