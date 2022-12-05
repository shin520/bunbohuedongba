<div class="form-group">
    <label for="">TRẠNG THÁI</label>
    <select name="hideshow" class="form-control">
        <option {{ $data->hideshow == 1 ? 'selected' : '' }} value="1">Hiện</option>
        <option {{ $data->hideshow == 0 ? 'selected' : '' }} value="0">Ẩn</option>
    </select>
</div>
