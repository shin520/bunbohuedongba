<div class="item_role">
    <label class="mb-1 ttu_ role_">slide</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-slide",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem slide">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-slide",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm slide">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-slide",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa slide">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-slide",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa slide">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
