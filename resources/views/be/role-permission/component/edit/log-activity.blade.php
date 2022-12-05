<div class="item_role">
    <label class="mb-1 ttu_ role_">lịch sử hoạt động</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-lich-su-hoat-dong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem lịch sử hoạt động">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-lich-su-hoat-dong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm lịch sử hoạt động">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-lich-su-hoat-dong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa lịch sử hoạt động">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-lich-su-hoat-dong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa lịch sử hoạt động">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
