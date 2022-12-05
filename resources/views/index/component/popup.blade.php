{{-- Popup --}}
<div class="float_search d-none">
    <div class="search__content">
        <div class="branch_btn--close">+</div>
        <div class="float_search__title">Hệ thống cửa hàng </div>
        <div class="float_search__img">
            <img class="img_cover"
                src="https://www.pho24.com.vn/wp-content/uploads/2018/05/600x328px_MENU_SLIDE-BIG-PHO_MELAMIN-01.png"
                alt="">
        </div>
        <div class="float_search__name">Gần bạn nhất</div>
        <span>Chọn khu vực bạn muốn tìm cửa hàng</span>
       <form action="{{ route('page',$share['all_branch_menu']->slug) }}" method="GET">
        <div class="float_search__form">
            <select class="input" name="search" id="">
                <option value="">Chọn khu vực</option>
                @foreach ($share['branch_category_1'] as $item)
                <option class="notranslate" value="{{ $item->slug }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <button class="input">Tìm nhanh</button>
        </div>
       </form>
    </div>
</div>
