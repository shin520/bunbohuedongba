<div class="form-group">
    <label for="">DANH MỤC</label>
    <select name="parent_id" class="form-control">
        <option value="">CHỌN DANH MỤC</option>
        @foreach ($parent as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>
