<div class="item_role">
    <label class="mb-1 ttu_ role_">quản lý file</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-quan-ly-file",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem quản lý file">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-quan-ly-file",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm quản lý file">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-quan-ly-file",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa quản lý file">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-quan-ly-file",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa quản lý file">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
