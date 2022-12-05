@extends('be.layouts.app')
@section('content')
<div class="card-body">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">THÊM QUYỀN
                    <a href="{{ route('be.role_permission.add') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm</a>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Người dùng</a></li>
                        <li class="breadcrumb-item active">Vai trò & Quyền</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <table id="roles" class="table table-striped table-rp">
            <thead>
              <tr>
                <th width="10%" scope="col">ID</th>
                <th width="20%" scope="col">Tên quyền</th>
                <th width="20%" scope="col">Ngày tạo</th>
                <th width="20%" scope="col">Ngày sửa</th>
                <th width="20%" scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <td data-label="ID" scope="row">{{ $loop->iteration }}</td>
                <td data-label="Tên quyền">{{ $item->description }}</td>
                <td data-label="Ngày tạo">{{ date("d/m/Y", strtotime($item->created_at)) }}</td>
                <td data-label="Ngày sửa">{{ date("d/m/Y", strtotime($item->updated_at)) }}</td>
                <td data-label="Thao tác">
                  <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Sửa" href="{{ route('be.role_permission.edit', $item->id ) }}"><i class="fa fa-edit"></i></a>
                  <form class="d-inline" method="POST" action="{{ route('be.role_permission.destroy', $item->id) }}"  >
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>

</div>
@endsection
