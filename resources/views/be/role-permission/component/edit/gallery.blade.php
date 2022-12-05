<div class="item_role">
    <label class="mb-1 ttu_ role_">thư viện ảnh</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-thu-vien-anh",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem thư viện ảnh">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-thu-vien-anh",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm thư viện ảnh">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-thu-vien-anh",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa thư viện ảnh">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-thu-vien-anh",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa thư viện ảnh">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
