<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>

    <div class="p-5 bg-primary text-white text-center">
        <h1>My First Bootstrap 5 Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
               
                    <div class="meessage"></div>
                
                <div class="d-flex justify-content-between">
                    <h2>Studet List</h2>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">+
                        Add Students</button>
                </div>
                @include('table')
            </div>

        </div>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
    </div>

    @include('entry')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            $(document).on('submit', '#StudentEntry', function(e) {
                e.preventDefault();
                let MyData = new FormData(this);
                console.log(Object.fromEntries(MyData));
                $('.error-text').text('');

                $.ajax({
                    url: "{{ route('student.store') }}",
                    method: "POST",
                    data: MyData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        // console.log(response);
                        $('#myModal').modal('hide');
                        // $('#StudentEntry').reset();
                        $('.meessage').html('<div class="alert alert-success">Inseted</div>');

                    },
                    error: function(err) {
                        let errors = err.responseJSON.errors;

                        $.each(errors, function(key, value) {
                            $('.' + key + '_error').text(value[0]);
                        });
                    }
                });
            })

        });
    </script>
</body>

</html>
