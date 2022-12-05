<div class="item_role">
    <label class="mb-1 ttu_ role_">thiết lập trang web</label>
    <div class="gr_pick_all">
        <input type="checkbox" class="check-all">
            <label class="per">Chọn tất cả</label>
        <div class="gr_pick">
            <input {{ checkRole("xem-thiet-lap-trang-web",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xem thiết lập trang web">
            <label class="per">Xem</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("them-thiet-lap-trang-web",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="thêm thiết lập trang web">
            <label class="per">Thêm</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("sua-thiet-lap-trang-web",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="sửa thiết lập trang web">
            <label class="per">Sửa</label>
        </div>
        <div class="gr_pick">
            <input {{ checkRole("xoa-thiet-lap-trang-web",json_decode($permissions)) }} type="checkbox" name="permission[]" class="checkbox" value="xóa thiết lập trang web">
            <label class="per">Xóa</label>
        </div>
    </div>
</div>
