@extends('backend.layout.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Pendidikan
                    </header>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Tingkatan</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Selesai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendidikan as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @if($item->tingkatan == 1) TK
                                        @elseif($item->tingkatan == 2) SD
                                        @elseif($item->tingkatan == 3) SMP
                                        @elseif($item->tingkatan == 4) SMA/SMK
                                        @elseif($item->tingkatan == 5) D3
                                        @elseif($item->tingkatan == 6) D4/S1
                                        @endif
                                    </td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->tahun_keluar }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-warning" href="{{ route('pendidikan.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                {!! csrf_field() !!}
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-right">
                            <a href="{{ route('pendidikan.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection