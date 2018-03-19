<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function routeNotificationForNexmo()//Slack or Mail or other provider
    {
        return $this->phone;
    }

    public function routeNotificationForSlack()
    {
        return env('SLACK_WEBHOOK');//we could put a column with the webhook for users like phone above
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $appends = array('thumbnail');//to override default

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');//model singular
    }

    public function getThumbnailAttribute()//accessor: change the attr without creating a new column
    {
        $path = pathinfo($this->profile_pic);
        //https://devmarketer.io/foo/bar/file-thumb.jpg; dirname gives https://devmarketer.io/foo/bar
        return $path['dirname'].'/'.$path['filename']."-thumb.jpg";
    }
}
