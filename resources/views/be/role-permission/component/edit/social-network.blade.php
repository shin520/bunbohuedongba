<div class="item_role">
    <label class="mb-1 ttu_ role_">mạng xã hội</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-mang-xa-hoi",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem mạng xã hội">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-mang-xa-hoi",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm mạng xã hội">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-mang-xa-hoi",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa mạng xã hội">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-mang-xa-hoi",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa mạng xã hội">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
