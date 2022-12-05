<div class="item_role">
    <label class="mb-1 ttu_ role_">danh mục bài viết</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-danh-muc-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem danh mục bài viết">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-danh-muc-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm danh mục bài viết">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-danh-muc-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa danh mục bài viết">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-danh-muc-bai-viet",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa danh mục bài viết">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
