<?php
namespace Tests\Feature;
use App\Models\Akun;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountCrudTest extends TestCase {
    use RefreshDatabase;

    public function test_account_can_be_created(): void {
        $response = $this->post(route('akun.store'), ['kode' => 'BANK-01', 'nama' => 'Bank Kelas', 'saldo_awal' => 100000]);
        $response->assertRedirect(route('akun.index'));
        $this->assertDatabaseHas('akun', ['kode' => 'BANK-01']);
    }

    public function test_account_requires_valid_data(): void {
        $response = $this->post(route('akun.store'), []);
        $response->assertSessionHasErrors(['kode', 'nama', 'saldo_awal']);
    }

    public function test_account_code_must_be_unique(): void {
        Akun::factory()->create(['kode' => 'KAS-01']);
        $response = $this->post(route('akun.store'), ['kode' => 'KAS-01', 'nama' => 'Kas Kedua', 'saldo_awal' => 0]);
        $response->assertSessionHasErrors('kode');
    }

    public function test_akun_rejects_negative_saldo_awal(): void {
        $response = $this->post(route('akun.store'), ['kode' => 'BANK-01', 'nama' => 'Bank Kelas', 'saldo_awal' => -1]);
        $response->assertSessionHasErrors('saldo_awal');
    }
}