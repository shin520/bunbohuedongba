@extends('be.layouts.app')
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Danh mục cấp 2
                        <a href="{{ route('be.branch_category_2.add') }}" class="btn btn-primary new-custom"><i
                                class="fa fa-plus"></i> Thêm</a>
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh mục cấp cấp 2</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="flink_filter" class="dataTables_filter">
                        <form action="{{ route('be.branch_category_2.index') }}" method="GET">
                            <input name="search" type="search" value="{{ $keyword ?? '' }}" class="form-control" placeholder="nhập tên cần tìm..." value="{{ $key_search ?? '' }}"
                            aria-controls="branches">
                        </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table text-center" id="branch_category_2">
                    <thead>
                        <tr>
                            <th width="5%" scope="col">STT</th>
                            <th width="25%" scope="col">DMC1</th>
                            <th width="35%" scope="col">Tên danh mục</th>
                            <th width="10%" scope="col">Nổi bật</th>
                            <th width="10%" scope="col">Ẩn hiện</th>
                            <th width="20%" scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">
                                   @include('be.component.show_number')
                                </th>
                                <td>
                                    <select data-id = {{ $item->id }} name="parent_id" class="form-control select_parent_of_child_parent select2">
                                        @if( $item->parent != NULL)
                                        @foreach ($parent as $p)
                                        <option {{ $p->id == $item->parent_id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                        @else
                                        <option value="">---Chưa chọn---</option>
                                        @foreach ($parent as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    @include('be.component.show_name')
                                </td>
                                <td>
                                   @include('be.component.show_featured_checkbox')
                                </td>
                                <td>
                                   @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td>
                                    @include('be.component.show_edit_btn',['model'=>'branch_category_2'])
                                    @include('be.component.show_delete_btn',['model'=>'branch_category_2'])
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
    @include('be.component.js_model_featured',['model'=>'branch_category_2'])
    @include('be.component.js_model',['model'=>'branch_category_2'])
    {{-- @include('be.component.js_datatable',['model'=>'branch_category_2']) --}}
@endpush

