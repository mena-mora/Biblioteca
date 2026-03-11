<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'fecha_entrega',
        'fecha_devolucion',
        'estado',
        'usuario_id',
        'libro_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
