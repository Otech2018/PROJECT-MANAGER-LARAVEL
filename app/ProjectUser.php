<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{


    /*** 
    //changing table
    protected $table ='categories';
    //changing primary ky
    public $primaryKey = 'category_id';
    //setting time stamps
    public $timestamps = true;
    ***/


    protected $table ="project_user";
    
    protected $fillable =[
        'project_id',
        'user_id',
    ];
}
