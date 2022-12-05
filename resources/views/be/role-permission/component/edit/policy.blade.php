<div class="item_role">
    <label class="mb-1 ttu_ role_">chính sách</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-chinh-sach",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem chính sách">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-chinh-sach",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm chính sách">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-chinh-sach",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa chính sách">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-chinh-sach",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa chính sách">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
