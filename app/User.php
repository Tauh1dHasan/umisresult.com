<?php

namespace App;

use App\Mail\ForgotPassword;
use App\Models\Backend\DriverState;
use App\Models\Backend\State;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\MailResetPasswordNotification;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get User Type by user_type
     *
     * @param integer $userType
     * @return void
     */
    public function getUserType( int $userType)
    {
        $user_type = [1=> 'Admin', 2=> 'Staff', 3=> 'Customer'];
        return $user_type[$userType] ?? 'No Found';
    }


    /**
     * Get Active Status by status
     *
     * @param integer $status
     * @return void
     */
    public function activeStatus(int $status)
    {
        if( $status == 1 ) {
            return '<span class="badge badge-secondary bg-success">Active</span>';
        } else {
            return '<span class="badge badge-secondary bg-danger">Suspend</span>';
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new MailResetPasswordNotification($token));
        Mail::to( $this->email)->send(new ForgotPassword($token));
    }

    public function State()
    {
        return $this->belongsTo(State::class,'state','id');
    }

    public function DriverState()
    {
        return $this->belongsTo(DriverState::class,'driver_licence_state','id');
    }


    
}
