<?php
/* Creo el modelo y controlador de Channel en artisan con:
* php artisan make:controller ChannelController --model=Channel
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'color'
    ];
}
