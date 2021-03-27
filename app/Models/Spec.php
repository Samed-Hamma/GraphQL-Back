<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function models() {
        return $this->belongsToMany(Model::class);
    }

    public function ads() {
        return $this->belongsToMany(Ad::class);
    }

    public function specName() {
        return $this->hasOne(SpecName::class);
    }
}
