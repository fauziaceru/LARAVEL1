<?php

namespace Tests\Feature;

use App\Filament\Resources\Kategoris\Pages\CreateKategori;
use App\Filament\Resources\Kategoris\Pages\EditKategori;
use App\Filament\Resources\Kategoris\Pages\ListKategoris;
use App\Models\Akun;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class KategoriResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_tamu_diarahkan_ke_halaman_login(): void
    {
        auth()->logout();

        $this->get('/admin/kategoris')->assertRedirect('/admin/login');
    }

    public function test_daftar_kategori_dapat_dibuka(): void
    {
        $kategori = Kategori::factory()->count(3)->create();

        Livewire::test(ListKategoris::class)
            ->assertOk()
            ->assertCanSeeTableRecords($kategori);
    }

    public function test_kategori_valid_dapat_dibuat(): void
    {
        Livewire::test(CreateKategori::class)
            ->fillForm([
                'kode' => 'DONASI',
                'nama' => 'Donasi',
                'jenis' => 'Pemasukan',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('kategori', ['kode' => 'DONASI']);
    }

    public function test_kode_duplikat_ditolak(): void
    {
        Kategori::factory()->create(['kode' => 'IURAN']);

        Livewire::test(CreateKategori::class)
            ->fillForm([
                'kode' => 'IURAN',
                'nama' => 'Iuran Kedua',
                'jenis' => 'Pemasukan',
            ])
            ->call('create')
            ->assertHasFormErrors(['kode' => 'unique']);
    }

    public function test_kategori_dapat_diubah_dengan_kode_sendiri(): void
    {
        $kategori = Kategori::factory()->create(['kode' => 'ATK']);

        Livewire::test(EditKategori::class, ['record' => $kategori->getRouteKey()])
            ->fillForm(['nama' => 'Alat Tulis Kantor'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('kategori', [
            'kode' => 'ATK',
            'nama' => 'Alat Tulis Kantor',
        ]);
    }

    public function test_kategori_yang_dipakai_transaksi_tidak_terhapus(): void
    {
        $kategori = Kategori::factory()->create();

        Transaksi::factory()->create([
            'kategori_id' => $kategori->id,
            'akun_id' => Akun::factory()->create()->id,
        ]);

        Livewire::test(ListKategoris::class)
            ->callAction(TestAction::make(DeleteAction::class)->table($kategori))
            ->assertNotified('Kategori tidak dapat dihapus');

        $this->assertModelExists($kategori);
    }
}