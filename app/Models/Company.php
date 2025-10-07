<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'domain'];


    // relations
    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function banners()
    {
        return $this->hasMany(Banner::class);
    }


    // add other relations later (departments, doctors...)
}
