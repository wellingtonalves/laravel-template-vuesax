<?php

namespace App\Models;

use App\Notifications\SignupActivateNotification;
use Emadadly\LaravelUuid\Uuids;
use App\Notifications\PasswordResetRequestNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, Notifiable, Uuids, SoftDeletes, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'uuid',
        'is_admin',
        'status',
        'remember_token',
        'profile_id',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_token',
        'id'
    ];

    /**
     * The nested's (relations)
     *
     * @var array
     */
    protected $nested = [
    ];

    /**
     * The with's (relations)
     *
     * @var array
     */
    public $with = [
        'profile'
    ];

    protected $appends = ['tipo_usuario'];

    /**
     * Send the sign up active notification.
     *
     * @return void
     */
    public function sendSignUpActiveNotification()
    {
        $this->notify(new SignupActivateNotification());
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetRequestNotification($token));
    }

    /**
     *  Mutator Password
     *
     * @param $pass
     */
    public function setPasswordAttribute($pass)
    {
        if (Hash::needsRehash($pass)) {
            $this->attributes['password'] = Hash::make($pass);
        } else {
            $this->attributes['password'] = $pass;
        }
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * @return BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * @return BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return BelongsTo
     */
    public function representative()
    {
        return $this->belongsTo(Representative::class);
    }

    public function getTipoUsuarioAttribute()
    {
        return $this->is_admin ? 'Admin' : 'Usuário';
    }
}
