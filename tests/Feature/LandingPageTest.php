<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * Test that the landing page renders successfully and contains essential mockup content.
     */
    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PagiBagi: Berbagi dari Pagi, Peduli Sesama.');
        $response->assertSee('Membiasakan sedekah subuh');
        $response->assertSee('Apa Itu Pagi Berbagi ?');
        $response->assertSee('Tiga Pilar Kebaikan Setiap Pagi');
        $response->assertSee('Rekapitulasi Partisipasi & Pengeluaran Infaq', false);
        $response->assertSee('Tabel Pengeluaran & Penyaluran Infaq', false);
    }

    /**
     * Test that the fallback dummy statistics and pengeluaran table data are displayed.
     */
    public function test_landing_page_displays_curated_dummy_data_when_database_is_empty(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Rp 48.650.000');
        $response->assertSee('89.4%');
        $response->assertSee('TARGET 85%');
        $response->assertSee('Renovasi Sarana Wudhu Masjid Sekolah');
        $response->assertSee('Santunan Siswa Berprestasi & Dhuafa');
        $response->assertSee('Paket Sarapan Berbagi Jumat Berkah');
        $response->assertSee('Tanggap Peduli Segera Duka 2');
    }

    /**
     * Test that the error notification modal is displayed when redirected with an error session.
     */
    public function test_landing_page_displays_error_notification_modal(): void
    {
        $response = $this->withSession(['error' => 'Anda tidak diizinkan untuk mengakses halaman ini'])
            ->get('/');

        $response->assertStatus(200);
        $response->assertSee('errorNotificationModal');
        $response->assertSee('Akses Ditolak');
        $response->assertSee('Anda tidak diizinkan untuk mengakses halaman ini');
        $response->assertSee('OK');
    }

    /**
     * Test that the success toast notification is displayed when redirected with a success session.
     */
    public function test_landing_page_displays_success_toast_notification(): void
    {
        $response = $this->withSession(['success' => 'Logout berhasil'])
            ->get('/');

        $response->assertStatus(200);
        $response->assertSee('toastSuccessNotification');
        $response->assertSee('Logout berhasil');
        $response->assertSee('toastSuccessProgressBar');
    }

    /**
     * Test that user can logout and redirect to home with success message.
     */
    public function test_user_can_logout_and_redirect_to_home_with_success_toast(): void
    {
        $response = $this->get(route('logout'));

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success', 'Logout berhasil');
    }
}
