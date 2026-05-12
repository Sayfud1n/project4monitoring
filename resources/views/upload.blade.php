<!DOCTYPE html>
<html>
<head>
    <title>Upload File Dengan Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .upload-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        /* Style untuk judul besar sesuai permintaan  */
        h2.display-4 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 upload-card">
                
                <h2 class="text-center display-4">Upload File Dengan Laravel</h2>
                <hr>

                {{-- Notifikasi Sukses --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Notifikasi Error Validasi [cite: 52, 144] --}}
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label><b>File Gambar</b></label> 
                        <input type="file" name="file" class="form-control-file p-2 border rounded">
                    </div>

                    <div class="form-group">
                        <label><b>Keterangan</b></label>
                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Masukkan keterangan gambar..."></textarea>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Upload & Resize" class="btn btn-primary btn-lg px-5">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>