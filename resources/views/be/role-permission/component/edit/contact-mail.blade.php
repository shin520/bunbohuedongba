<div class="item_role">
    <label class="mb-1 ttu_ role_">mail liên hệ</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
        <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-mail-lien-he",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem mail liên hệ">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-mail-lien-he",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm mail liên hệ">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-mail-lien-he",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa mail liên hệ">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-mail-lien-he",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa mail liên hệ">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
