<?php

namespace Tests\Unit;

use App\Models\Ferramenta;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FerramentaTest extends TestCase {

    use DatabaseMigrations;

    public function testCriarFerramenta() {

        $type = Type::factory()->create([
            'nome' => 'ADMIN'
        ]);

        $user = User::factory()->create([
            'name' => 'root',
            'email' => 'root@email.com',
            'type_id' => $type->id,
            'password' => bcrypt('root12345678')
        ]);

        $ferramentaData = [
            'nome' => 'martelo',
            'estoque' => 10 
        ];

        $this->actingAs($user)->post('/ferramentas', $ferramentaData)->assertRedirect('/ferramentas');

        $ferramenta = Ferramenta::find(1);

        $this->assertEquals('martelo', $ferramenta->nome);
        
    }
}