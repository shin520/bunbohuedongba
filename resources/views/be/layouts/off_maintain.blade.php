<!-- Modal tat bao tri-->
<div class="modal fade" id="popup_offmaintain" tabindex="-1" role="dialog" aria-labelledby="popup_offmaintain"
    aria-hidden="true">
    <div class="modal-dialog" role="maintain">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Đưa Website vào trạng thái hoạt động bình thường !</h5>
                <form id="up_web" method="post" action="{{ route('up_web') }}">
                    @csrf
                    <input style="margin-bottom: 5px" class="form-control " type="text"
                        placeholder="Nhập mật khẩu kích hoạt lại Website" id="pass" name="pass" required>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger pull-left" data-bs-toggle="modal"
                    data-bs-target="#popup_rspass_maintain" data-bs-dismiss="modal" class="active-confirm" href="#"
                    data-bs-toggle="modal" data-bs-target="#popup_rspass_maintain"> <i class="fa-solid fa-unlock-keyhole"></i>
                    Khôi phục mật khẩu</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-ban"></i>
                    Hủy</button>
                <button type="submit" class="btn btn-success"> <i class="fa-solid fa-bolt-lightning"></i> Kích hoạt</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal --}}
