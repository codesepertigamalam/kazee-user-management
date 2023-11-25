<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id_profile';

    protected $fillable = [
        'id_user',
        'location',
        'phone',
        'about'
    
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);   
    }
}