<!DOCTYPE html>
<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center my-5">Dropzone PDF Upload in Laravel</h2>
        <form action="{{ route('pdf.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="pdf-upload">
            @csrf
        </form>
        <div class="text-center mt-4">
            <button id="button" class="btn btn-primary px-5">Upload PDF</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('#pdf-upload', {
            maxFilesize: 1, // Maksimal 1MB [cite: 489]
            acceptedFiles: ".pdf", // Hanya menerima format PDF 
            addRemoveLinks: true,
            autoProcessQueue: false,
            init: function () {
                $("#button").click(function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });
            }
        });
    </script>
</body>
</html>