<div class="item_role">
    <label class="mb-1 ttu_ role_">lịch sử tải xuống</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-lich-su-tai-xuong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem lịch sử tải xuống">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-lich-su-tai-xuong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm lịch sử tải xuống">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-lich-su-tai-xuong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa lịch sử tải xuống">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-lich-su-tai-xuong",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa lịch sử tải xuống">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
