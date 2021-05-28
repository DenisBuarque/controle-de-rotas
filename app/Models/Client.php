<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone','address','number','address_complement','postal_code','district','city','state'];

    public function destinies ()
    {
        return $this->hasMany(Destiny::class);
    }
    
    /*public function clientservice()
    {
        return $this->hasMany(ClientService::class,'origin');
    }*/
}
