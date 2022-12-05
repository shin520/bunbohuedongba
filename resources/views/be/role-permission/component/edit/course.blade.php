<div class="item_role">
    <label class="mb-1 ttu_ role_">khóa học</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem khóa học">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm khóa học">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa khóa học">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa khóa học">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
