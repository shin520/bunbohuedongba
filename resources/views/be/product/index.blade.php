@extends('be.layouts.app')
@section('content')
<div class="card-body">

    @component('be.component.breadcrumb',['model'=>'product'])
    @slot('li_1') Tổng quan @endslot
    @slot('title') Sản phẩm @endslot
    @slot('btn')@endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div id="product_filter" class="dataTables_filter">
                <form action="{{ route('be.product.index') }}" method="GET">
                   <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <input name="search" type="search" class="form-control" placeholder="Tìm sản phẩm" value="{{ $key_search ?? '' }}">
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <button class="btn btn-primary w-100">Tìm</button>
                          </div>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center table-rp" id="product">
                <thead>
                    <tr width="100%">
                        <th width="5%" scope="col">STT</th>
                        <th width="25%" scope="col">Tên</th>
                        <th width="15%" scope="col">DM c1</th>
                        {{-- <th width="15%" scope="col">DM c2</th> --}}
                        <th width="10%" scope="col">Xem</th>
                        <th width="10%" scope="col">Ẩn hiện</th>
                        {{-- <th width="10%" scope="col">Nổi bật</th> --}}
                        <th width="10%" scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr class="tr_id_{{ $item->id }}">
                        <td data-label="STT" scope="row">
                            @include('be.component.show_number')
                        </td>
                        <td data-label="Tên">
                            @include('be.component.show_name')
                        </td>
                        <td data-label="Danh mục C1">
                            <select data-id={{ $item->id }} name="parent_id" class="form-control select_parent select2">
                                @if( $item->parent != NULL)
                                @foreach ($parent as $p)
                                <option {{ $p->id == $item->parent_id ? 'selected' : '' }} value="{{ $p->id }}">{{
                                    $p->name }}</option>
                                @endforeach
                                @else
                                <option value="">---Chưa chọn---</option>
                                @foreach ($parent as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </td>
                        {{-- <td data-label="Danh mục C2">
                            <select data-id="{{ $item->id }}" name="parent_child_id"
                                class="form-control select_parent_child select2" id="show_children{{ $item->id }}">
                                @if($item->parent_child != NULL)
                                @foreach ($item->parent->children as $item_c)
                                <option data-parent-id="{{ $item->parent_id ?? '' }}" {{ $item_c->id ==
                                    $item->parent_child->id ? 'selected' : '' }} value="{{ $item_c->id }}">{{
                                    $item_c->name }}</option>
                                @endforeach
                                @else
                                <option value="0">---Chọn danh mục---</option>
                                @if($item->parent_id != NULL)
                                @foreach ($item->parent->children as $item_c)
                                <option data-parent-id="{{ $item->parent_id ?? '' }}" value="{{ $item_c->id }}">{{
                                    $item_c->name }}</option>
                                @endforeach
                                @endif
                                @endif
                            </select>
                        </td> --}}
                        <td data-label="Xem">
                            @include('be.component.show_link', ['model'=>'product'])
                        </td>
                        <td data-label="Hiển thị">
                            @include('be.component.show_hideshow_checkbox')
                        </td>
                        {{-- <td data-label="Nổi bật">
                            @include('be.component.show_featured_checkbox')
                        </td> --}}
                        <td data-label="Thao tác">
                            @include('be.component.show_edit_btn',['model'=>'product'])
                            @include('be.component.show_delete_btn',['model'=>'product'])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            {{ $data->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
@push('script')
@include('be.component.js_model', ['model'=> 'product']);

@endpush
