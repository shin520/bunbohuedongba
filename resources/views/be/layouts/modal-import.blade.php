<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chèn Database</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('import_db') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <p>Database up lên sẽ thay thế Database cũ, hãy đảm bảo rằng bạn đã backup Database trước khi thực hiện thao tác này !</p>
            <div class="form-group mb-2">
                <label for="">Tải lên database</label>
                <input type="file" name="file" class="form-control">
            </div>
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
