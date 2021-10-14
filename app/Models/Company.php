<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";

    protected $primaryKey = "id";

    protected $fillable = ['name'];

    public function users() {

        return $this->hasMany(User::class);
    }
}
