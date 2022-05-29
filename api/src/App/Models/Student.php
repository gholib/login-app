<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'nik_name',
        'first_name',
        'last_name',
        'created_at'
    ];
}