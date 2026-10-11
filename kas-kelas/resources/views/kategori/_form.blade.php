@csrf 
 
<div> 
    <label for="kode">Kode</label> 
    <input id="kode" name="kode" value="{{ old('kode', $kategori->kode ?? '') }}" required> 
    @error('kode')<p class="error">{{ $message }}</p>@enderror 
</div> 
<div> 
    <label for="nama">Nama kategori</label> 
    <input id="nama" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}" required> 
    @error('nama')<p class="error">{{ $message }}</p>@enderror 
</div> 
<div> 
    <label for="jenis">Jenis</label> 
    <select id="jenis" name="jenis" required> 
        @foreach (['Pemasukan', 'Pengeluaran'] as $jenis) 
            <option value="{{ $jenis }}" @selected(old('jenis', $kategori->jenis ?? '') === $jenis)>
{{ $jenis }}</option> 
        @endforeach 
    </select> 
    @error('jenis')<p class="error">{{ $message }}</p>@enderror 
</div> 