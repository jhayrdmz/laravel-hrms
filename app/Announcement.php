<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Announcement extends Model {

    use SoftDeletes;

    protected $fillable = [
        'title', 'status', 'content', 'publish_at'
    ];

    public function setPublishAtAttribute($value) {
        $this->attributes['publish_at'] = Carbon::createFromFormat('m/d/Y h:i A', $value);
    }

    public function getPublishAtAttribute($value) {
        return Carbon::parse($value)->format('m/d/Y h:i A');
    }

    public function scopeAuthorized($query) {
        if(!auth()->user()->hasRole('admin')) {
            return $query->where('user_id', auth()->user()->id);
        }
    }

    public function scopePublished($query) {
        return $query->where('status', 'published');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function postStatus() {
        return [
            'published' => 'Published',
            'draft' => 'Draft'
        ];
    }

}
