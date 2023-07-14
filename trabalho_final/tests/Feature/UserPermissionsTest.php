<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserPermissions extends TestCase {

    public function testPermissaoRotaFerramentas() {

        $response = $this->get('/ferramentas');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}