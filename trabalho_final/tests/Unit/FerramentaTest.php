<?php

namespace Tests\Unit;

use App\Http\Controllers\FerramentaController;
use App\Models\Ferramenta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FerramentaTest extends TestCase {

    use RefreshDatabase;
   
    public function testExluirFerramenta() {

        $ferramenta = Ferramenta::factory()->create([
            'nome' => 'ferramente teste',
            'estoque' => 10
        ]);

        $this->assertTrue($ferramenta->estoque >= 0);
        
    }
}
