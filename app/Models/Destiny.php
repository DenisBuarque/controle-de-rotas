<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destiny extends Model
{
    use HasFactory;

    protected $fillable = ['checked','client_id','service_id','user_id','content'];

    public function client()
    {
        return $this->belongsTo(Client::class);        
    }

    public function service()
    {
        return $this->belongsTo(Service::class);        
    }

    public function user()
    {
        return $this->belongsTo(User::class);        
    }
}
