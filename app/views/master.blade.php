<!doctype html>
<html lang="en">
<head>
    <title>Gallery</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="UTF-8">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Mono">

    <link rel="stylesheet" href="/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/components-font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/jquery-colorbox/example4/colorbox.css">
    <link rel="stylesheet" href="/vendor/blueimp-file-upload/css/jquery.fileupload.css">

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
            font-size: 7em;
            color: #fff;
        }

        #subtitle-banner {
            font-family: 'Lobster', Arial, serif;
            font-size: 2em;
            color: #fff;
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

    <script src="/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/vendor/jquery-ui/ui/widget.js"></script>
    <script src="/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/vendor/jquery-colorbox/jquery.colorbox-min.js"></script>
    <script src="/vendor/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="/vendor/blueimp-file-upload/js/jquery.fileupload.js"></script>
    <script src="/vendor/holderjs/holder.js"></script>

    @include('external.googleAnalytic');

    @yield('scripts', '')
</body>
</html>
