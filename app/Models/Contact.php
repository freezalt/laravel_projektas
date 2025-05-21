<?php
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model 
{ 
    use HasFactory; 
    protected $fillable = ['name', 'phone', 'email']; 
    use SoftDeletes; // Naudojame SoftDeletes trait
    protected $dates = ['deleted_at']; // Nurodome, kad tai data
}

