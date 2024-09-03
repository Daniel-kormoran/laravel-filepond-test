<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Filepond Test</title>

    <meta name="_token" content="{{ csrf_token() }}"/>

    <style>
        body {
            font-family: 'Montserrat';
            padding-top: 80px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Add Posts</h1>

                <form class="forms-tambah" action="/" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="title" class="required-field">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description">
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Multiple upload for Foto Lomba --}}
                    <div class="form-group">
                        <label for="image">Upload Image : </label>
                        <input type="file" class="form-control" name="image" class="filepond" multiple/>
                        @error('file')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-tambah">Add Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <style>
        
    </style>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                process: '/upload',
                revert: '/delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });

    </script>
</body>
</html>




