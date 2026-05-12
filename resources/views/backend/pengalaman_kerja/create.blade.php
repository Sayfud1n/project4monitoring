@extends('backend.layout.template')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Pengalaman Kerja</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pengalaman Kerja</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" method="POST" action="{{ route('pengalaman_kerja.store') }}">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pengalaman Kerja</h4>
                        <br>
                        
                        {{-- Nama Perusahaan - Hanya Huruf --}}
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Nama Perusahaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" 
                                       placeholder="Nama Perusahaan (Hanya Huruf)" 
                                       pattern="[A-Za-z\s]+" title="Hanya boleh huruf dan spasi" 
                                       required>
                                <small class="text-muted">Hanya boleh huruf (tidak boleh angka).</small>
                            </div>
                        </div>

                        {{-- Jabatan --}}
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                            </div>
                        </div>

                        {{-- Tahun - Hanya 4 Digit Angka --}}
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Tahun</label>
                            <div class="col-sm-9">
                                <input type="text" name="tahun" class="form-control" 
                                       placeholder="Contoh: 2026" 
                                       maxlength="4" pattern="\d{4}" title="Harus 4 digit angka" 
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                       required>
                                <small class="text-muted">Masukkan 4 digit tahun.</small>
                            </div>
                        </div>

                        {{-- Keterangan --}}
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" class="form-control" rows="4" placeholder="Deskripsi pekerjaan" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection