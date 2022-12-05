<input type="text" data-id="{{ $item->id }}"
    value="@if (isset($item->number)) {{ old('number', $item->number) }}@else{{ old('number') }} @endif" class="number">
