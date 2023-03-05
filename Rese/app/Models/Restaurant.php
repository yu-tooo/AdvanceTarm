<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'img_url', 'comment'];

    public function detail() {
        return $this->hasOne('App\Models\Detail');
    }

    public function favorite() {
        return $this->hasOne('App\Models\Favorite');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getUrl() {
        return $this->img_url;
    }
}
