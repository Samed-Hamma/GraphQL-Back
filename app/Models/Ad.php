<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelClass;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Ad extends ModelClass
{
    use HasFactory;
    use SoftDeletes;

    protected $softCascade = ['refreshes'];

    protected $guarded = [];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function model() {
        return $this->belongsTo(Model::class);
    }

    public function specs() {
        return $this->belongsToMany(Spec::class);
    }

    public function refreshes() {
        return $this->hasMany(Job::class);
    }

    public function delete()
    {
        $refreshes = $this->refreshes;
        $count_promo = $refreshes ? $refreshes->count() : null;
        $user_id = $this->user->id ?? null;
        if ($user_id && $count_promo) {
            Log::info("Deleting Ad: $this->id\n\tAdding $count_promo count_promo to user $user_id");
            Balance::create(compact('count_promo', 'user_id'));
        }
        return parent::delete();
    }
}
