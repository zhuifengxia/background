<?php namespace Modules\Backend\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as UserBase;
class User extends UserBase {
    use Authenticatable;
    protected $table = 'exam_backendusers';
    protected $fillable = [];
    public $timestamps = false;

}