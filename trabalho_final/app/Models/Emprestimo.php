<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['funcionario_id', 'ferramenta_id', 'quantidade'];

    public function funcionario() {
        return $this->belongsTo('App\Models\Funcionario');
    }

    public function ferramenta() {
        return $this->belongsTo('App\Models\Ferramenta');
    }
}
