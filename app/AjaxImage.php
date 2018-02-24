<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class AjaxImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'document1', 'document2', 'document3','image'
    ];
}