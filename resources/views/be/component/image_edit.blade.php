<div class="form-group">
    <label for="">ẢNH</label>
    <img id="imgpreview" src="{{ asset('storage/uploads') }}/{{ $data->img == '' ? 'placeholder.png' : $data->img }}" class="img-fluid mb-2">
    <input type="file" name="img" class="form-control" data-toggle="tooltip"
        data-placement="top" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
</div>
