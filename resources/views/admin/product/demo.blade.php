<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Laravel Filemanager</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2 class="mt-4">Standalone Image Button</h2>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="filepath">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
        <h2 class="mt-4">Standalone File Button</h2>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail2" class="form-control" type="text" name="filepath">
        </div>
        <div id="holder2" style="margin-top:15px;max-height:100px;"></div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image');
    $('#lfm2').filemanager('file');
  </script>

</body>
</html>
