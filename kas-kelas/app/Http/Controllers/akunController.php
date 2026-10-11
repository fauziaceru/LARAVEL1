<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Akun; 
use Illuminate\Database\QueryException; 
use Illuminate\Http\RedirectResponse; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Log; 
use Illuminate\Validation\Rule; 
use Illuminate\View\View; 
 
class AkunController extends Controller 
{ 
    public function index(Request $request): View 
    { 
        $akun = Akun::query() 
            ->when($request->filled('search'), fn ($query) => 
                $query->where('nama', 'like', '%' . $request->string('search') . '%')) 
            ->orderBy('nama')->paginate(10)->withQueryString(); 
 
        return view('akun.index', compact('akun')); 
    } 
 
    public function create(): View { return view('akun.create'); } 
 
    public function store(Request $request): RedirectResponse 
    { 
        Akun::create($request->validate($this->rules())); 
        return to_route('akun.index')->with('success', 'Akun berhasil ditambahkan.'); 
    } 
 
    public function show(Akun $akun): View { return view('akun.show', compact('akun')); } 
 
    public function edit(Akun $akun): View { return view('akun.edit', compact('akun')); } 
 
    public function update(Request $request, Akun $akun): RedirectResponse 
    { 
        $akun->update($request->validate($this->rules($akun))); 
        return to_route('akun.index')->with('success', 'Akun berhasil diperbarui.'); 
    } 
 
    public function destroy(Akun $akun): RedirectResponse 
    { 
        try { 
            $akun->delete(); 
        } catch (QueryException $exception) { 
            Log::warning('Akun masih digunakan transaksi.', ['akun_id' => $akun->id]); 
            return to_route('akun.index')->with('error', 'Akun tidak dapat dihapus karena masih digunakan transaksi.'); 
        } 
        return to_route('akun.index')->with('success', 'Akun berhasil dihapus.'); 
    } 
 
    private function rules(?Akun $akun = null): array 
    { 
        return [ 
            'kode' => ['required', 'string', 'max:20', Rule::unique('akun', 'kode')->ignore($akun)], 
            'nama' => ['required', 'string', 'max:100'], 
            'saldo_awal' => ['required', 'numeric', 'min:0'], 
        ]; 
    } 
} 