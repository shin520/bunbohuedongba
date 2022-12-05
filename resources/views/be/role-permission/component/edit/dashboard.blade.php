<div class="item_role">
    <label class="mb-1 ttu_ role_">trang tổng quan</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-trang-tong-quan",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem trang tổng quan">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-trang-tong-quan",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm trang tổng quan">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-trang-tong-quan",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa trang tổng quan">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-trang-tong-quan",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa trang tổng quan">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
