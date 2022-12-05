@extends('be.layouts.app')
@section('content')
<div class="card-body">
    @component('be.component.breadcrumb')
    @slot('li_1') Sản phẩm @endslot
    @slot('title')Thêm Sản phẩm @endslot
    @endcomponent
    <form action="{{ route('be.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row" id="create_form">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        @include('be.component.name_add')
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>MÃ SẢN PHẨM <a href="#" class="gen__code"><i class="bx bx-lock-alt"></i> Tạo
                                    mã</a></label>
                            <div class="d-flex">
                                <input type="text" name="product_code" id="product_code"
                                    value="{{ old('product_code') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">DANH MỤC CẤP 1</label>
                            <select name="parent_id" class="form-control" id="select_parent">
                                <option value="0">Chọn cấp 1</option>
                                @foreach ($parent as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="">DANH MỤC CẤP 2</label>
                            <select name="parent_child_id" class="form-control" id="show_children">
                                <option value="">---Chọn danh mục cấp 1 trước---</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>GIÁ SẢN PHẨM (₫) @include('be.component.hint',['des'=>'Giá hiển thị sản
                                phẩm','title'=>'Giá sản phẩm'])</label>
                            <input type="text" name="price" id="price" value="{{ old('price') }}" class="form-control"
                                placeholder="300.000">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>GIÁ THỊ TRƯỜNG (đ) @include('be.component.hint',['des'=>'Giá ảo sản phẩm, đưa giá cao
                                hơn để giảm giá','title'=>'Giá thị trường'])</label>
                            <input type="text" placeholder="350.000" name="fake_price" value="{{ old('fake_price') }}"
                                id="fake_price" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        @include('be.component.hideshow_add')
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        @include('be.component.image_add', ['res'=>'255 x 175px'])
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        @include('be.component.multi_upload_image_add',['model'=>'product'])
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.description_add')
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.content_add')
                    </div>
                </div>
            </div>

            @include('be.component.seo-create')
            @include('be.component.button_submit',['model'=>'product'])
        </div>
    </form>
</div>
@endsection
@push('script')
<script>
    function generatePassword(passwordLength) {
            var numberChars = "0123456789";
            var upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var lowerChars = "abcdefghijklmnopqrstuvwxyz";
            var allChars = numberChars + upperChars + lowerChars;
            var randPasswordArray = Array(passwordLength);
            randPasswordArray[0] = numberChars;
            randPasswordArray[1] = upperChars;
            randPasswordArray[2] = lowerChars;
            randPasswordArray = randPasswordArray.fill(allChars, 3);
            return shuffleArray(randPasswordArray.map(function (x) {
                return x[Math.floor(Math.random() * x.length)]
            })).join('');
        }

    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
        return array;
    }
    $(".gen__code").on("click", function () {
        var code = generatePassword(10);
        $('#product_code').val(code);
    });

    function formatNumber(nStr, decSeperate, groupSeperate) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
        }

    $('#price').on('change',function(){
        var price = $(this).val();
        $(this).val(formatNumber(price, '.', '.'));
    })
    $('#fake_price').on('change',function(){
        var price = $(this).val();
        $(this).val(formatNumber(price, '.', '.'));
    })
</script>
@endpush
