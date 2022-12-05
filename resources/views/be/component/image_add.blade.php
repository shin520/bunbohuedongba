<div class="form-group">
    <label for="">ẢNH</label>
    <small>
        <i class="fas fa-question-circle" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Tỉ lệ hình {{ $shape ?? 'chữ nhật' }}, kích thước gợi ý là ({{ $res ?? '200 X 100 PX' }})" title="ẢNH ĐẠI DIỆN"></i>
    </small>
    <img id="imgpreview" src="{{ asset('storage/uploads') }}/placeholder.png" class="img-fluid mb-2">
    <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
</div>
