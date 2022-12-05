@php print '<?xml version="1.0" encoding="UTF-8" ?>'; @endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">


    <url>
    <loc>{{ url('/')}}</loc>
    <lastmod>2022-07-03</lastmod>
    <image:image>
      <image:loc>{{ url('/')}}/storage/uploads/setting/{{ $info->logo }}</image:loc>
      <image:title>{{ $info->title }}</image:title>
      <image:caption>{{ $info->title }}</image:caption>
    </image:image>
  </url>
  @foreach ($data['page'] as $item)
  <url>
    <loc>{{ route('page_detail',$item->slug)}}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($item->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ asset('storage/uploads/'.$item->img) }}</image:loc>
      <image:title>{{ $item->title_seo }}</image:title>
      <image:caption>{{ $item->title_seo }}</image:caption>
    </image:image>
  </url>
  @endforeach
  @foreach ($data['cate1'] as $item)
  <url>
    <loc>{{ route('category_product',$item->slug)}}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($item->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ asset('storage/uploads/'.$item->img) }}</image:loc>
      <image:title>{{ $item->title_seo }}</image:title>
      <image:caption>{{ $item->title_seo }}</image:caption>
    </image:image>
  </url>
  @endforeach
  @foreach ($data['cate2'] as $item)
  <url>
    <loc>{{ route('category_child_product',[$item->parent->slug,$item->slug])}}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($item->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ asset('storage/uploads/'.$item->img) }}</image:loc>
      <image:title>{{ $item->title_seo }}</image:title>
      <image:caption>{{ $item->title_seo }}</image:caption>
    </image:image>
  </url>
  @endforeach
  @foreach ($data['product'] as $item)
  <url>
    <loc>{{ route('link_detail',[$item->parent->slug,$item->parent_child->slug,$item->slug])}}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($item->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ asset('storage/uploads/'.$item->img) }}</image:loc>
      <image:title>{{ $item->title_seo }}</image:title>
      <image:caption>{{ $item->title_seo }}</image:caption>
    </image:image>
  </url>
  @endforeach
</urlset>
