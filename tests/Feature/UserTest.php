<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess():void
    {
        $this->post('/api/register', [
            'username' => 'operator',
            'password' => 'password',
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    'username' => 'operator'
                ]
            ]);
    }

    public function testRegisterFailed()
    {
        $this->post('/api/register', [
            'username' => '',
            'password' => '',
        ])->assertStatus(422)
        ->assertJson([
                "errors" => [
                    'username' => ['Username wajib diisi.'],
                    'password' => ['Password wajib diisi.'],
                ]
            ]);
    }

    public function testRegisterExists() 
    {
        $this->testRegisterSuccess();
        $this->post('/api/register', [
            'username' => 'operator',
            'password' => 'password',
        ])->assertStatus(422)
            ->assertJson([
                "errors" => [
                    'username' => ["Username sudah digunakan."]
                ]
            ]);
    }
}
