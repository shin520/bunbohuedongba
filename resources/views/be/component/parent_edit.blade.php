<div class="form-group">
    <label for="">DANH MỤC</label>
    <select name="parent_id" class="form-control">
        <option value="">CHỌN DANH MỤC</option>
        @foreach ($parent as $item)
            <option {{ $item->id == $data->parent_id ? 'selected' : '' }}
                value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>
