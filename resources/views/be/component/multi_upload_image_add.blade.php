<div class="form-group">
    <div class="position-relative form-group">
        <label for="details" class="">HÌNH CHI TIẾT</label>
        <div class="needsclick dropzone" id="document-dropzone">
            <DIV class="dz-message needsclick">
                Kéo và thả hình vào đây để tải lên.<br>
               Hoặc <br>
               <span><i class="fas fa-upload"></i> Tải lên</span>
              </DIV>
        </div>
    </div>
</div>
@push('script')
<script>
    let uploadedDocumentMap = {};
    Dropzone.autoDiscover = false;
    let myDropzone = new Dropzone("div#document-dropzone",{
        url: "{{ route('be.'.$model.'.uploadImageViaAjax') }}",
        thumbnailHeight: 120,
        thumbnailWidth: 120,
        autoProcessQueue: true,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: 10,
        maxFilesize: 5, // Max filesize in MB
        acceptedFiles: "image/*",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        successmultiple: function(data, response) {
            $.each(response['name'], function (key, val) {
                $('form').append('<input type="hidden" name="images[]" value="' + val + '">');
                uploadedDocumentMap[data[key].name] = val;
            });
        },
        removedfile: function (file) {
            file.previewElement.remove()
            let name = '';
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name;
            } else {
                name = uploadedDocumentMap[file.name];
            }
            $('form').find('input[name="images[]"][value="' + name + '"]').remove()
        }
    });
</script>
@endpush
