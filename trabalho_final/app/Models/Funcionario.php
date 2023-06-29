<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'email', 'cpf'];

    public function emprestimo() {
        return $this->hasMany('App\Models\Emprestimo');
    }
}
