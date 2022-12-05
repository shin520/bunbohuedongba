<div class="form-group">
    <label for="">NỔI BẬT</label>
    <select name="featured" class="form-control">
        <option {{ $data->featured == 1 ? 'selected' : '' }} value="1">Có</option>
        <option {{ $data->featured == 0 ? 'selected' : '' }} value="0">Không</option>
    </select>
</div>
