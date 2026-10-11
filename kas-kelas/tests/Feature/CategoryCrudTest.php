<?php 
 
namespace Tests\Feature; 
 
use App\Models\Kategori; 
use Illuminate\Foundation\Testing\RefreshDatabase; 
use Tests\TestCase; 
 
class CategoryCrudTest extends TestCase 
{ 
    use RefreshDatabase; 
 
    public function test_category_can_be_created(): void 
    { 
        $response = $this->post(route('kategori.store'), [ 
            'kode' => 'DONASI', 
            'nama' => 'Donasi', 
            'jenis' => 'Pemasukan', 
        ]); 
 
        $response->assertRedirect(route('kategori.index')); 
        $this->assertDatabaseHas('kategori', [ 
            'kode' => 'DONASI', 
            'nama' => 'Donasi', 
        ]); 
    } 
 
    public function test_category_requires_valid_data(): void 
    { 
        $response = $this->post(route('kategori.store'), []); 
 
        $response->assertSessionHasErrors(['kode', 'nama', 'jenis']); 
    } 
 
    public function test_category_code_must_be_unique(): void 
    { 
        Kategori::factory()->create(['kode' => 'IURAN']); 
 
        $response = $this->post(route('kategori.store'), [ 
            'kode' => 'IURAN', 
            'nama' => 'Iuran Kedua', 
            'jenis' => 'Pemasukan', 
        ]); 
 
        $response->assertSessionHasErrors('kode'); 
    } 
 
    public function test_category_rejects_invalid_type(): void 
       { 
        $response = $this->post(route('kategori.store'), [ 
            'kode' => 'LAIN', 
            'nama' => 'Jenis Tidak Valid', 
            'jenis' => 'Lainnya', 
        ]); 
 
        $response->assertSessionHasErrors('jenis'); 
    } 
} 