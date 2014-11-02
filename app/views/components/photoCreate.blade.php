<h3 class="text-center">Upload Photos</h3>
<div class="btn btn-primary btn-block fileinput-button">
    <i class="fa fa-camera"> Select Files...</i>
    <input type="file" name="files[]" id="photo-upload" multiple>
</div>

<script>
    (function ($, window) {
        'use strict';

        $(function () {
            $('#photo-upload').fileupload({
                url: '{{ URL::route('albums.photos.store', [$album->getKey()]) }}',
                dataType: 'JSON',
                sequentialUploads: true,
                stop: function (e, data) {
                    window.location = '{{ URL::route('albums.show', [$album->getKey()]) }}';
                }
            });
        });
    })(window.jQuery, window);
</script>
