<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login_page_loads_successfully(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('login');
    }

    public function test_login_page_contains_expected_ui_elements(): void
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee('Selamat Datang');
        $response->assertSee('Satu Langkah Kecil');
        $response->assertSee('Username');
        $response->assertSee('Kata Sandi');
        $response->assertSee('Ingat saya');
        $response->assertSee('Masuk ke Dashboard');
        $response->assertSee('Kembali ke Halaman Utama');
    }

    public function test_failed_login_displays_inline_error_alert(): void
    {
        $response = $this->withSession(['failed' => 'username atau password salah'])
            ->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee('Gagal Masuk');
        $response->assertSee('username atau password salah');
    }

    public function test_authenticated_user_cannot_access_login_page(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get(route('login'));
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('error', 'Anda sudah login');
    }

    public function test_user_can_login(): void
    {
        $user = \App\Models\User::factory()->create([
            'username' => 'admin_test',
            'password' => 'password123',
            'role' => 'admin',
        ]);

        $response = $this->post(route('login'), [
            'username' => 'admin_test',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.overview'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_access_login_after_logging_in(): void
    {
        $user = \App\Models\User::factory()->create([
            'username' => 'admin_test2',
            'password' => 'password123',
            'role' => 'admin',
        ]);

        $this->post(route('login'), [
            'username' => 'admin_test2',
            'password' => 'password123',
        ]);

        $response = $this->get(route('login'));
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('error', 'Anda sudah login');
    }
}
