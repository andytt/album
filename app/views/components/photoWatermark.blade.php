<h3 class="text-center">Upload Watermark</h3>
<div class="btn btn-primary btn-block fileinput-button">
    <i class="fa fa-camera"></i><span>&nbsp;Select&nbsp;Files...</span>
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
                url: '{{ URL::route('albums.photos.api.textWatermark', [$album->getKey(), $photo->getKey()]) }}',
                dataType: 'JSON',
                sequentialUploads: true,
                add: function (e, data) {
                    $('.fileinput-button').find('i').removeClass('fa-camera').addClass('fa-refresh fa-spin');
                    $('.fileinput-button').find('span').html('&nbsp;Uploading...');
                    data.submit();
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);

                    $('#upload-progress').find('.progress-bar').css('width', progress + '%').attr('aria-valuenow', progress).html(progress + '%');
                },
                stop: function (e, data) {
                    window.location = '{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}';
                }
            });
        });
    })(window.jQuery, window);
</script>
