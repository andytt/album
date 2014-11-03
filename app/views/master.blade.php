<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example4/colorbox.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
    <link href='//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/css/jquery.fileupload.min.css' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        html, body {
            font-family: 'PT Mono', Arial, serif;
            width: 100%;
            height: 100%;
        }

        #title-banner {
            font-family: 'Lobster', Arial, serif;
            font-size: 100px;
        }

        #cboxCurrent {
            position: absolute;
            bottom: 0;
            right: 0;
            left: auto;
            color: #999;
        }

        #cboxNext {
            position: absolute;
            bottom: 0;
            left: 85px;
            color: #444;
        }

        #upload-progress {
            margin-top: 10px;
            margin-bottom: 0;
        }
    </style>
    @yield('styles', '')

</head>
<body class="container-fluid">
    @yield('body', 'OOPS...')

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/jquery.iframe-transport.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.7/jquery.fileupload.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/holder/2.4.1/holder.js"></script>

    @yield('scripts', '')
</body>
</html>
