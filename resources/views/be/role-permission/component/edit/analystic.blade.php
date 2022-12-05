<div class="item_role">
    <label class="mb-1 ttu_ role_">thống kê dữ liệu</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
        <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem thống kê dữ liệu">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm thống kê dữ liệu">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa thống kê dữ liệu">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa thống kê dữ liệu">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
