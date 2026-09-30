<?php

namespace Tests\Feature;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Periode;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Siswa;
use App\Models\StatistikRayon;
use App\Models\StatistikRombel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ErdModelsTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_erd_models_and_relationships_work_correctly(): void
    {
        // 1. Create Rombel and Rayon
        $rombel = Rombel::create([
            'nama_kelas' => 'PPLG XII-1',
            'tingkat' => '12',
        ]);

        $rayon = Rayon::create([
            'nama_rayon' => 'Ciawi 1',
        ]);

        $this->assertDatabaseHas('rombel', [
            'id_rombel' => $rombel->id_rombel,
            'nama_kelas' => 'PPLG XII-1',
        ]);

        $this->assertDatabaseHas('rayon', [
            'id_rayon' => $rayon->id_rayon,
            'nama_rayon' => 'Ciawi 1',
        ]);

        // 2. Create User linked to Rombel and Rayon
        $user = User::create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'secret123',
            'role' => 'sekretaris',
            'id_rombel' => $rombel->id_rombel,
            'id_rayon' => $rayon->id_rayon,
        ]);

        $this->assertEquals($rombel->id_rombel, $user->rombel->id_rombel);
        $this->assertEquals($rayon->id_rayon, $user->rayon->id_rayon);
        $this->assertTrue($rombel->users->contains($user));
        $this->assertTrue($rayon->users->contains($user));

        // 3. Create Siswa
        $siswa = Siswa::create([
            'nis' => 12209001,
            'nama_siswa' => 'Budi Santoso',
            'id_rombel' => $rombel->id_rombel,
            'id_rayon' => $rayon->id_rayon,
        ]);

        $this->assertDatabaseHas('siswa', [
            'nis' => 12209001,
            'nama_siswa' => 'Budi Santoso',
        ]);
        $this->assertEquals($rombel->id_rombel, $siswa->rombel->id_rombel);
        $this->assertEquals($rayon->id_rayon, $siswa->rayon->id_rayon);
        $this->assertTrue($rombel->siswa->contains($siswa));
        $this->assertTrue($rayon->siswa->contains($siswa));

        // 4. Create Periode
        $periode = Periode::create([
            'minggu_ke' => 1,
            'tanggal_mulai' => '2026-09-01',
            'tanggal_selesai' => '2026-09-07',
        ]);

        $this->assertDatabaseHas('periode', [
            'id_periode' => $periode->id_periode,
            'minggu_ke' => 1,
        ]);

        // 5. Create Pemasukan
        $pemasukan = Pemasukan::create([
            'nis' => $siswa->nis,
            'id_periode' => $periode->id_periode,
            'id_user' => $user->id_user,
            'nominal_infaq_masjid' => 5000.00,
            'nominal_pagi_berbagi' => 2000.00,
            'status_bayar' => true,
            'tanggal_bayar' => now(),
        ]);

        $this->assertDatabaseHas('pemasukan', [
            'id_pemasukan' => $pemasukan->id_pemasukan,
            'status_bayar' => true,
        ]);
        $this->assertEquals($siswa->nis, $pemasukan->siswa->nis);
        $this->assertEquals($periode->id_periode, $pemasukan->periode->id_periode);
        $this->assertEquals($user->id_user, $pemasukan->user->id_user);
        $this->assertTrue($siswa->pemasukan->contains($pemasukan));
        $this->assertTrue($periode->pemasukan->contains($pemasukan));
        $this->assertTrue($user->pemasukan->contains($pemasukan));

        // 6. Create Pengeluaran
        $pengeluaran = Pengeluaran::create([
            'id_user' => $user->id_user,
            'nominal' => 50000.00,
            'keterangan' => 'Penyaluran infaq yatim',
            'tanggal' => '2026-09-05',
            'image_url' => 'receipts/nota_01.jpg',
        ]);

        $this->assertDatabaseHas('pengeluaran', [
            'id_pengeluaran' => $pengeluaran->id_pengeluaran,
            'keterangan' => 'Penyaluran infaq yatim',
        ]);
        $this->assertEquals($user->id_user, $pengeluaran->user->id_user);
        $this->assertTrue($user->pengeluaran->contains($pengeluaran));

        // 7. Create StatistikRombel
        $statRombel = StatistikRombel::create([
            'id_rombel' => $rombel->id_rombel,
            'id_periode' => $periode->id_periode,
            'total_nominal' => 7000.00,
            'jumlah_siswa_bayar' => 1,
            'total_siswa' => 1,
            'presentase_partisipasi' => 100.00,
            'presentase_perubahan' => 0.00,
        ]);

        $this->assertDatabaseHas('statistik_rombel', [
            'id_statistik' => $statRombel->id_statistik,
        ]);
        $this->assertEquals($rombel->id_rombel, $statRombel->rombel->id_rombel);
        $this->assertEquals($periode->id_periode, $statRombel->periode->id_periode);
        $this->assertTrue($rombel->statistikRombel->contains($statRombel));
        $this->assertTrue($periode->statistikRombel->contains($statRombel));

        // 8. Create StatistikRayon
        $statRayon = StatistikRayon::create([
            'id_rayon' => $rayon->id_rayon,
            'id_periode' => $periode->id_periode,
            'total_nominal' => 7000.00,
            'jumlah_siswa_bayar' => 1,
            'total_siswa' => 1,
            'presentase_partisipasi' => 100.00,
            'presentase_perubahan' => 0.00,
        ]);

        $this->assertDatabaseHas('statistik_rayon', [
            'id_statistik' => $statRayon->id_statistik,
        ]);
        $this->assertEquals($rayon->id_rayon, $statRayon->rayon->id_rayon);
        $this->assertEquals($periode->id_periode, $statRayon->periode->id_periode);
        $this->assertTrue($rayon->statistikRayon->contains($statRayon));
        $this->assertTrue($periode->statistikRayon->contains($statRayon));
    }
}
