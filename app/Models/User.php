<?php

namespace App\Models;


use App\Models\UserProfile;
use App\Traits\Model\UserHasOneRoleTrait;
use App\Traits\Model\UserHasOneUserProfileTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;//发送通知
    use EntrustUserTrait;

    use UserHasOneRoleTrait,UserHasOneUserProfileTrait;
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
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * 自定义收件人
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->profile->address;
    }

    /**
     * 用户接收广播通知的通道.
     *
     * @return array
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'users.'.$this->id;
    }
}
