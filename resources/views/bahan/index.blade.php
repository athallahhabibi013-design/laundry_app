<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Bahan Pembersih Laundry</title>
    <!-- Memanggil CSS dari folder public -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <div class="container">
        <!-- Header -->
        <header>
            <h1>Manajemen Bahan Pembersih Laundry</h1>
            <p>Modul Pengelolaan Stok dan Bahan Operasional Laundry</p>
            
            <!-- STEP 4: Menampilkan Nama & Role User yang Sedang Login di Header -->
            @auth
                <div style="margin-top: 10px; font-size: 14px; background: rgba(255,255,255,0.1); padding: 8px; border-radius: 5px;">
                    Login sebagai: <b>{{ auth()->user()->name }}</b> | Role: <b>{{ auth()->user()->role }}</b>
                </div>
            @endauth

            <!-- Tombol Exit / Logout -->
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                @csrf
                <button type="submit" class="btn-delete" style="padding: 8px 20px; cursor: pointer; font-size: 14px;">Exit / Logout</button>
            </form>
        </header>

        <main>
            <!-- Section Form -->
            <section class="form-section">
                <h2>{{ isset($edit_data) ? 'Edit Bahan Pembersih' : 'Tambah Bahan Pembersih' }}</h2>
                
                <form action="{{ route('bahan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $edit_data->id ?? '' }}">
                    
                    <div class="form-group">
                        <label>Nama Bahan:</label>
                        <input type="text" name="nama_bahan" value="{{ $edit_data->nama_bahan ?? old('nama_bahan') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori:</label>
                        <input type="text" name="kategori" value="{{ $edit_data->kategori ?? old('kategori') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Merek:</label>
                        <input type="text" name="merek" value="{{ $edit_data->merek ?? old('merek') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Stok:</label>
                        <input type="number" name="stok" value="{{ $edit_data->stok ?? old('stok') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Satuan:</label>
                        <input type="text" name="satuan" value="{{ $edit_data->satuan ?? old('satuan') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Supplier:</label>
                        <input type="text" name="nama_supplier" value="{{ $edit_data->nama_supplier ?? old('nama_supplier') }}" required>
                    </div>

                    <button type="submit" class="btn-submit">Simpan Data</button>
                    
                    @isset($edit_data)
                        <a href="{{ route('bahan.index') }}" class="btn-cancel">Batal</a>
                    @endisset
                </form>
            </section>

            <!-- Section Tabel -->
            <section class="table-section">
                <h2>Daftar Bahan Pembersih</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Kategori</th>
                            <th>Merek</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Supplier</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_bahan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_bahan }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->merek }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->nama_supplier }}</td>
                            <td>
                                <a href="{{ route('bahan.edit', $item->id) }}" class="btn-edit">Edit</a>
                                
                                <!-- STEP 4: Tombol Hapus disembunyikan jika role BUKAN admin -->
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <a href="{{ route('bahan.destroy', $item->id) }}" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>
</html>