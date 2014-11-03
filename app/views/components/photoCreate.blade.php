<h3 class="text-center">Upload Photos</h3>
<div class="btn btn-primary btn-block fileinput-button">
    <i class="fa fa-camera"> Select Files...</i>
    <input type="file" name="files[]" id="photo-upload" multiple>
</div>

<div class="progress" id="upload-progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
</div>

<script>
    (function ($, window) {
        'use strict';

        $(function () {
            $('#photo-upload').fileupload({
                url: '{{ URL::route('albums.photos.store', [$album->getKey()]) }}',
                dataType: 'JSON',
                sequentialUploads: true,
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);

                    $('#upload-progress').find('.progress-bar').css('width', progress + '%').attr('aria-valuenow', progress).html(progress + '%');
                },
                stop: function (e, data) {
                    window.location = '{{ URL::route('albums.show', [$album->getKey()]) }}';
                }
            });
        });
    })(window.jQuery, window);
</script>
