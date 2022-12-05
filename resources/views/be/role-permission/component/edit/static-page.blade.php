<div class="item_role">
    <label class="mb-1 ttu_ role_">trang tĩnh</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem trang tĩnh">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm trang tĩnh">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa trang tĩnh">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-thong-ke-du-lieu",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa trang tĩnh">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
