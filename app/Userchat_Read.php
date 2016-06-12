<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userchat_Read extends Model
{
    //

    protected $table = 'userchat_reads';
    protected $fillable =['user_id', 'chat_room_id'];
}
