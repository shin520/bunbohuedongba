<div class="stm-lms-dynamic_sidebar">
    <div class="widget widget_stm_lms_popular_courses">
        <div class="widget_title">
            <h2 class="h3 mb-2">NỔI BẬT</h2>
        </div>
        <ul class="stm_product_list_widget widget_woo_stm_style_2">
            @foreach ($hot as $item)
            <li class="mb-2">
                <a href="{{ route('link_detail',[$item->parent->slug,$item->parent_child->slug,$item->slug]) }}"
                    class="flex_futured">
                    <img width="75" height="40"
                        src="{{ cropsize('/storage/uploads/'.$item->img,'300','200','100','1') }}"
                        alt="" loading="lazy">
                    <div class="meta">
                        <div class="title h6">{{ $item->name }}</div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="multiseparator"></div>
</div>
