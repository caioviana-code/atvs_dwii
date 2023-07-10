<?php

use App\Models\Ferramenta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FerramentaControllerTest extends TestCase {

    use RefreshDatabase;

    public function testStore() {

        $response = $this->post('/ferramentas', [
            'nome' => 'ferramenta teste',
            'estoque' => 10,
        ]);

        $response->assertStatus(302);

        $ferramenta = Ferramenta::where('nome', 'ferramenta teste')->first();
        $this->assertNotNull($ferramenta);
        $this->assertEquals('ferramenta teste', $ferramenta->nome);
        $this->assertEquals(10, $ferramenta->estoque);

    }
}