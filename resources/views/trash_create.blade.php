<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Trash') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('trash.store') }}" enctype="multipart/form-data">
                            @csrf

                            <label for="photo">Photo:</label><br>
                            <input type="file" id="photo" name="photo" required><br>

                            <label for="address">Address:</label><br>
                            <input type="text" id="address" name="address" required><br>

                            <label for="request_comment">Request Comment:</label><br>
                            <textarea id="request_comment" name="request_comment" required></textarea><br>

                            <label for="city">City:</label><br>
                            <input type="text" id="city" name="city" required><br><br>

                            <label for="price">Price:</label><br>
                            <input type="text" id="price" name="price" required><br><br>
                            <input type="hidden" id="trash_status" name="trash_status" value="1"><br><br>

                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
