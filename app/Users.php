<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable {

    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'admin_ip_address', 'email', 'password', 'status', 'mobile',
        'phone', 'state_id', 'city_name', 'zip_code', 'county_id', 'last_login', 'is_login', 'user_type_id', 'personal_email', 'brand_name',
        'role_id', 'ip_address', 'status', 'address', 'office_address', 'client_code', 'office_phone', 'gst_number', 'pan_number', 'adhar_number',
        'url', 'country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
