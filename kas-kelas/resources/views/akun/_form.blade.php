@csrf

<div>
    <label for="kode">Kode</label>
    <input id="kode" name="kode" value="{{ old('kode', $akun->kode ?? '') }}" required>
    @error('kode')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="nama">Nama akun</label>
    <input id="nama" name="nama" value="{{ old('nama', $akun->nama ?? '') }}" required>
    @error('nama')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="saldo_awal">Saldo awal</label>
    <input id="saldo_awal" name="saldo_awal" type="number" min="0" step="0.01" value="{{ old('saldo_awal', $akun->saldo_awal ?? 0) }}" required>
    @error('saldo_awal')
        <p class="error">{{ $message }}</p>
    @enderror
</div>