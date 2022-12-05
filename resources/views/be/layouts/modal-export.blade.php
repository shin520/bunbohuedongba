<div class="modal fade" id="staticBackdrop_export" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop_exportLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdrop_exportLabel">Xuất Database</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('export_db') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="">Mật khẩu ứng dụng</label>
                <input type="text" name="pass" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </div>
        </form>
        </div>
    </div>
</div>
