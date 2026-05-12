@extends('backend.layout.template')

@section('content')
<section id="main-content">
    <section class="wrapper" style="margin-top: 60px;">
        
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1"> 
                <section class="panel">
                    <header class="panel-heading text-center" style="font-weight: bold;">
                        TAMBAH DATA PEGAWAI (ACARA 18)
                    </header>
                    <div class="panel-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pegawai.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group text-center">
                                <label><b>Nama Lengkap</b></label>
                                <input type="text" name="nama" class="form-control text-center" placeholder="Masukkan Nama Lengkap" required>
                            </div>

                            <div class="form-group text-center">
                                <label><b>NIP</b></label>
                                <input type="text" name="nip" class="form-control text-center" placeholder="Masukkan NIP" required>
                            </div>

                            <div class="form-group text-center">
                                <label><b>Alamat</b></label>
                                <textarea name="alamat" class="form-control text-center" rows="4" placeholder="Masukkan Alamat Lengkap" required></textarea>
                            </div>

                            <hr>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="width: 150px;">Simpan Data</button>
                                <a href="{{ route('pegawai.index') }}" class="btn btn-default" style="width: 150px;">Batal</a>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection