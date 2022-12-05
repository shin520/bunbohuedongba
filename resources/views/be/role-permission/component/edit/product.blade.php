<div class="item_role">
    <label class="mb-1 ttu_ role_">sản phẩm</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-san-pham",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem sản phẩm">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-san-pham",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm sản phẩm">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-san-pham",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa sản phẩm">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-san-pham",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa sản phẩm">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
