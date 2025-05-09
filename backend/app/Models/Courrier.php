<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    //
    protected $fillable = [
        'reference',
        'type',
        'objet',
        'expediteur',
        'destinataire',
        'service_destinataire',
        'service_emetteur',
        'date_reception',
        'statut',
        'commentaire',
        'fichier_path',
    ];
    protected $casts = [
        'date_reception' => 'datetime',
    ];
    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_pers');
    }
}
