<div class="item_role">
    <label class="mb-1 ttu_ role_">đơn hàng</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-don-hang",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem đơn hàng">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-don-hang",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm đơn hàng">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-don-hang",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa đơn hàng">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-don-hang",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa đơn hàng">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
