<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::beginTransaction();
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown(); 
    }

    /** @test */
    public function test_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Registration successful. Please log in.');

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'jenisuser_id' => 2,
            'create_by' => 'system',
            'update_by' => 'system',
        ]);
    }
    /** @test */
    public function test_loginsesuai()
    {
        User::insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'jenisuser_id' => 2,
            'create_by' => 'system',
            'update_by' => 'system',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/user/dashboard');
        $this->assertAuthenticated();
    }

    /** @test */
    public function test_loginsalah()
    {
        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['error' => 'Invalid credentials.']);
    }

    /** @test */
    public function test_logout()
    {
        User::insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'jenisuser_id' => 2,
            'create_by' => 'system',
            'update_by' => 'system',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::where('email', 'test@example.com')->first();
        Auth::login($user);

        $response = $this->post('/logout');

        $response->assertRedirect(route('landing'));
        $this->assertGuest();
    }
}
