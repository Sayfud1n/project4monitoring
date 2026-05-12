<!DOCTYPE html>
<html>
<head>
    <title>Multiple Upload with Dropzone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 10px;
            background: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center display-4 my-5">Multiple Upload Dropzone</h2>
        
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                    @csrf
                    <div class="dz-message">
                        <h4>Tarik gambar ke sini atau klik untuk unggah</h4>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <button id="upload-button" class="btn btn-primary px-5">Unggah Sekarang</button>
                    <a href="{{ route('upload') }}" class="btn btn-secondary">Kembali ke Acara 19</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

    <script type="text/javascript">
        // Konfigurasi Dropzone
        Dropzone.options.imageUpload = {
            maxFilesize: 2, // Maksimal 2MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            autoProcessQueue: false, // File tidak langsung diunggah sampai tombol ditekan
            init: function() {
                var myDropzone = this;

                // Aksi tombol unggah
                $("#upload-button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on('success', function(file, response) {
                    console.log("Berhasil: " + response.success);
                });
            }
        };
    </script>
</body>
</html>