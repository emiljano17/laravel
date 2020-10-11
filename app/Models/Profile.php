<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Profile extends Model
{

    protected $guarded = [];

    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : 'profile/kHFseeTRqzR5UhuL2N9mZhhzLV8DfOOnT5RaTHDi.jpeg';
        return '/storage/'. $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
