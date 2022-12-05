<div class="item_role">
    <label class="mb-1 ttu_ role_">danh mục khóa học</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-danh-muc-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem danh mục khóa học">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-danh-muc-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm danh mục khóa học">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-danh-muc-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa danh mục khóa học">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-danh-muc-khoa-hoc",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa danh mục khóa học">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
