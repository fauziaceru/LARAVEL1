<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Kategori; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Log; 
use Illuminate\Validation\Rule; 
use Illuminate\View\View; 
 
class KategoriController extends Controller 
{ 
    public function index(Request $request): View 
    { 
        $kategori = Kategori::query() 
            ->when($request->filled('search'), fn ($query) => 
                $query->where('nama', 'like', '%' . $request->string('search') . '%')) 
            ->orderBy('nama') 
            ->paginate(10) 
            ->withQueryString(); 
 
        return view('kategori.index', compact('kategori')); 
    } 
 
    public function create(): View 
    { 
        return view('kategori.create'); 
    } 
 
    public function store(Request $request): RedirectResponse 
    { 
        Kategori::create($request->validate($this->rules())); 
 
        return to_route('kategori.index') 
            ->with('success', 'Kategori berhasil ditambahkan.'); 
    } 
 
    public function show(Kategori $kategori): View 
    {
            return view('kategori.show', compact('kategori')); 
    } 
 
    public function edit(Kategori $kategori): View 
    { 
        return view('kategori.edit', compact('kategori')); 
    } 
 
    public function update(Request $request, Kategori $kategori): RedirectResponse 
    { 
        $kategori->update($request->validate($this->rules($kategori))); 
 
        return to_route('kategori.index') 
            ->with('success', 'Kategori berhasil diperbarui.'); 
    } 
 
    public function destroy(Kategori $kategori): RedirectResponse 
    { 
        try { 
            $kategori->delete(); 
        } catch (\Illuminate\Database\QueryException $exception) { 
            Log::warning('Kategori masih digunakan transaksi.', ['kategori_id' => $kategori->id]); 
            return to_route('kategori.index') 
                ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan transaksi.'); 
        } 
 
        return to_route('kategori.index') 
            ->with('success', 'Kategori berhasil dihapus.'); 
    } 
 
    private function rules(?Kategori $kategori = null): array 
    { 
        return [ 
            'kode' => ['required', 'string', 'max:20', Rule::unique('kategori', 'kode')->ignore($kategori)], 
            'nama' => ['required', 'string', 'max:100'], 
            'jenis' => ['required', Rule::in(['Pemasukan', 'Pengeluaran'])], 
        ]; 
    } 
} 