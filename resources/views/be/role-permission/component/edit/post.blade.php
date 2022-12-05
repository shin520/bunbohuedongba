<div class="item_role">
    <label class="mb-1 ttu_ role_">bài viết</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem bài viết">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm bài viết">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa bài viết">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa bài viết">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
