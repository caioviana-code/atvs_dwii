<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TypeFactory extends Factory {
    
    public function definition() {
        
        return [
            'nome' => $this->faker->name(),
        ];
    }
}
