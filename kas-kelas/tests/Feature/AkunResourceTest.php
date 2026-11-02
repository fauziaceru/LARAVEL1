<?php

namespace Tests\Feature;

use App\Filament\Resources\Akuns\Pages\CreateAkun;
use App\Filament\Resources\Akuns\Pages\ListAkuns;
use App\Models\Akun;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AkunResourceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_daftar_akun_dapat_dibuka(): void
    {
        $akun = Akun::factory()->count(3)->create();

        Livewire::test(ListAkuns::class)
            ->assertOk()
            ->assertCanSeeTableRecords($akun);
    }

    public function test_saldo_awal_negatif_ditolak(): void
    {
        Livewire::test(CreateAkun::class)
            ->fillForm([
                'kode' => 'KAS',
                'nama' => 'Kas Tunai',
                'saldo_awal' => -1000,
            ])
            ->call('create')
            ->assertHasFormErrors(['saldo_awal' => 'min']);

        $this->assertDatabaseMissing('akun', ['kode' => 'KAS']);
    }

    public function test_akun_yang_dipakai_transaksi_tidak_terhapus(): void
    {
        $akun = Akun::factory()->create();

        Transaksi::factory()->create([
            'akun_id' => $akun->id,
            'kategori_id' => Kategori::factory()->create()->id,
        ]);

        Livewire::test(ListAkuns::class)
            ->callAction(TestAction::make(DeleteAction::class)->table($akun))
            ->assertNotified('Akun tidak dapat dihapus');

        $this->assertModelExists($akun);
    }
}