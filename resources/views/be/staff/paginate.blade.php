<table class="table table-bordered table-rp">
    <tr>
        <thead>
            <td scope="col">#</td>
            <td scope="col">IPv4/IPv6</td>
            <td scope="col">Thiết bị</td>
            <td scope="col">Trình duyệt</td>
            <td scope="col">Thời gian</td>
        </thead>
    </tr>
    @foreach ($history_login as $item)
    <tr>
        <td data-label="#">{{ $loop->iteration }}</td>
        <td data-label="IP">{{ $item->ip }}</td>
        <td data-label="Thiết bị">{{ $item->device }}</td>
        <td data-label="Trình duyệt">{{ $item->browser }}</td>
        <td data-label="Thời gian">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}</td>
    </tr>
    @endforeach

</table>

<div class="row mt-3">
    <div class="col-sm-12">
        {{ $history_login->links('pagination::bootstrap-4') }}
    </div>
</div>
