<div class="item_role">
    <label class="mb-1 ttu_ role_">sản phẩm danh mục cấp 2</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-san-pham-danh-muc-cap-2",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem sản phẩm danh mục cấp 2">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-san-pham-danh-muc-cap-2",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm sản phẩm danh mục cấp 2">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-san-pham-danh-muc-cap-2",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa sản phẩm danh mục cấp 2">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-san-pham-danh-muc-cap-2",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa sản phẩm danh mục cấp 2">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
