@extends('backend.layout.template')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Manajemen Profil</h4>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <form class="form-horizontal" method="POST" action="{{ route('profile.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <h4 class="card-title">Edit Profil: {{ $user->name }}</h4>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" 
                                       value="{{ $user->detail_profile->alamat ?? '' }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">No. HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nomor_hp" class="form-control" 
                                       value="{{ $user->detail_profile->nomor_hp ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body text-right">
                            <button type="submit" class="btn btn-success text-white">Update Profil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection