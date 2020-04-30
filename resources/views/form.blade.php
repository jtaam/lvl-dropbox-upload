<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel | Upload</title>

        <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    </head>
    <body>
        <div class="container pt-3">
          <h3 class="mb-5">Upload file to Dropbox</h3>
          <form class="" action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="file" name="upload_file" class="form-control-file" id="upload_file">
            </div>
            <input type="submit" value="Upload" class="btn btn-sm btn-primary" />
          </form>
        </div>
    </body>
</html>
