<div class="col-md-12">
    <hr>
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0 font-size-18">NỘI DUNG SEO GOOGLE</h4>
    </div>

    <div class="form-group mb-3">
        <label for="">URL</label>
        <input type="text" class="form-control" value="{{ old('slug') }}" name="slug" id="url_new">
    </div>


    <div class="form-group mb-3">
        <label for="">TIÊU ĐỀ</label>
        <input type="text" class="form-control" value="{{ old('title_seo') }}" name="title_seo" id="title_seo_new">
    </div>

    <div class="form-group mb-3">
        <label for="">TỪ KHÓA</label>
        <input type="text" class="form-control" value="{{ old('keyword_seo') }}" name="keyword_seo" id="keyword_seo_new">
    </div>

    <div class="form-group mb-3">
        <label for="">MÔ TẢ</label>
        <textarea name="description_seo" id="description_seo_new" cols="30" rows="5" class="form-control">{!! old('description_seo') !!}</textarea>
    </div>

    <div class="col-md-12">
        <div class="show-web">
            <div class="url">{{ url('/') }}/<span id="url_preview"></span>.html <i
                    class="fas fa-angle-down"></i>
            </div>
            <h3><a target="_blank" href="{{ '/' }}"><span id="title_preview"></span></a>
            </h3>
            <div>
                <p id="description_preview"></p>
            </div>
        </div>
    </div>
</div>

