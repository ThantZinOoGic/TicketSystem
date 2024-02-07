<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_ticket');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'label_ticket');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
}
