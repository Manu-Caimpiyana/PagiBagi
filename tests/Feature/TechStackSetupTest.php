<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Blade;
use Maatwebsite\Excel\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TechStackSetupTest extends TestCase
{
    use RefreshDatabase;

    public function test_spatie_permission_roles_and_permissions_work(): void
    {
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'manage-users']);
        $role->givePermissionTo($permission);

        $user = User::factory()->create();
        $user->assignRole('admin');

        $this->assertTrue($user->hasRole('admin'));
        $this->assertTrue($user->hasPermissionTo('manage-users'));
    }

    public function test_laravel_excel_is_registered_and_bound(): void
    {
        $this->assertTrue(app()->bound('excel'));
        $this->assertInstanceOf(Excel::class, app('excel'));
    }

    public function test_blade_lucide_icon_renders_svg(): void
    {
        $rendered = Blade::render('<x-lucide-check class="w-5 h-5" />');

        $this->assertStringContainsString('<svg', $rendered);
        $this->assertStringContainsString('w-5', $rendered);
    }

    public function test_welcome_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_blade_app_layout_renders_correctly(): void
    {
        $rendered = Blade::render('<x-layouts.app title="Test Page"><p>Contoh Konten</p></x-layouts.app>');

        $this->assertStringContainsString('Test Page', $rendered);
        $this->assertStringContainsString('Contoh Konten', $rendered);
    }
}
