<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'courrier_id',
        'type',
        'message',
        'is_read',
        'date_rappel'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'date_rappel' => 'datetime'
    ];

    public function courrier()
    {
        return $this->belongsTo(Courrier::class);
    }
}
