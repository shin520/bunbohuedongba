<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/uploads') }}/{{ $setting->favicon }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->name }} | PANEL ADMIN</title>
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <!-- DataTables -->
    <link href="{{ asset('assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/alertify/alertify.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/select2/css/select2.min.css">
    <link href="{{ asset('assets/libs/admin-resources/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/mystyle.css">
    <script src="{{ asset('assets') }}/libs/chart.js/Chart.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/jfiler/css/jfiler.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/libs/jfiler/css/themes/jquery.filer-dragdropbox-theme.css">
    @stack('style')
</head>

<body data-sidebar="dark" id="main">
    <div id="layout-wrapper">
        @include('be.layouts.header')
        @include('be.layouts.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="card">
                        @if ($errors->any())
                        <div class="alert alert-danger show__errors" style="display: none">
                            <ul style="padding-left: 0px;">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('be.layouts.modal')
            @include('be.layouts.footer')

        </div>
    </div>
    @include('sweetalert::alert')
    @include('be.layouts.mode')
    <div class="rightbar-overlay"></div>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top" >
        <i class="fas fa-arrow-up"></i>
    </button>
    <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/libs/switchbox/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/admin-resources/rwd-table/rwd-table.min.js"></script>
    <script src="{{ asset('assets') }}/libs/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/fontawesome.init.js"></script>
    <script src="{{ asset('assets') }}/libs/alertify/alertify.min.js"></script>
    <script src="{{ asset('assets') }}/js/app.js"></script>
    <script src="{{ asset('assets') }}/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('assets') }}/libs/ckfinder/ckfinder.js"></script>
    <script src="{{ asset('assets') }}/libs/jfiler/js/jquery.filer.js"></script>
    <script src="{{ asset('assets') }}/libs/dropzone/dropzone.js"></script>

    <script src="{{ asset('assets') }}/js/custom.js"></script>
    {{-- @include('be.layouts.myscript') --}}

    @include('ckfinder::setup')
    <script>
        CKFinder.config( { connectorPath: '/ckfinder/connector' } );
    </script>

    <script>
        if ($('#url_editor').length) {
            CKEDITOR.replace('url_editor');
            CKFinder.setupCKEditor( CKEDITOR );
        }
        if ($('#map_editor').length) {
            CKEDITOR.replace('map_editor');
            CKFinder.setupCKEditor( CKEDITOR );
        }
        if ($('#content_editor').length) {
            CKEDITOR.replace('content_editor');
            CKFinder.setupCKEditor( CKEDITOR );
        }
        if ($('#description_editor').length) {
            CKEDITOR.replace('description_editor');
            CKFinder.setupCKEditor( CKEDITOR );
        }

        $(document).ready(function() {
            $('.select2').select2({
                tags: true,
            });

        });
    </script>
    <script>
        $('.del-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Xác nhận Xóa ?',
                text: "Không thể khôi phục sau khi Xóa !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#556ee6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    reload();
                } else {
                    Swal.fire(
                        'Đã hủy !',
                        'Bạn chưa Xóa gì cả !',
                        'error'
                    )
                }
            })
        });
    </script>
    <script>
        function toSlug(str) {
            str = str.toLowerCase();
            str = str
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '');
            str = str.replace(/[đĐ]/g, 'd');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            str = str.replace(/(\s+)/g, '-');
            str = str.replace(/-+/g, '-');
            str = str.replace(/^-+|-+$/g, '');
            return str;
        }
    </script>
    <script>
        $('#create_form  #name_new').on('keyup', function() {
            text = $(this).val();
            slug = toSlug(text);
            $('#description_new').val(text)
            $('#title_seo_new').val(text)
            $('#keyword_seo_new').val(text)
            $('#description_seo_new').val(text)
            $('#url_new').val(slug);
            $('#url_preview').text(slug);
            $('#title_preview').text(text);
            $('#description_preview').text(text);
        });
        $('#url_new').on('change keyup', function() {
            text = $(this).val();
            slug = toSlug(text);
            $(this).val(slug);
            $('#url_preview').text(slug);
        });
        $('#title_seo_new').on('change keyup', function() {
            text = $(this).val();
            $('#title_preview').text(text);
        });
        $('#description_seo_new').on('change keyup', function() {
            text = $(this).val();
            $('#description_preview').text(text);
        });
    </script>
    <script>
        $('#select_parent').on('change', function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ route('be.product.get_parent_child') }}',
                data: {
                    id: id
                },
                success: function(result) {
                    $('#show_children').html(result);
                }
            })
        });
    </script>
    <script>
        $('.select_parent').on('change', function() {
            var id_flink = $(this).attr('data-id');
            var id_parent = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ route('be.product.update_parent') }}',
                data: {
                    id_parent: id_parent,
                    id_flink: id_flink
                },
                success: function(result) {
                    $('#show_children' + id_flink).css('border', '2px solid red').html(result);
                    Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                }
            })
        });
    </script>
    <script>
        $('.select_parent_of_child_parent').on('change', function() {
                var id_flink_child_parent = $(this).attr('data-id');
                var id_parent = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '{{ route('be.product_category_2.update_parent') }}',
                    data: {
                        id_parent: id_parent,
                        id_flink_child_parent: id_flink_child_parent
                    },
                    success: function(data) {
                         Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                    }
                })
            });
    </script>
    <script>
        $('.select_parent_child').on('change', function() {
            var id_flink = $(this).attr('data-id');
            var id_parent_child = $(this).val();

            $.ajax({
                type: "GET",
                url: '{{ route('be.product.update_parent_child') }}',
                data: {
                    id_parent_child: id_parent_child,
                    id_flink: id_flink,
                },
                success: function(data) {
                         Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                    }
            })
        });
    </script>

    {{-- ajax cate branch --}}
    <script>
        $('#select_parent').on('change', function() {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ route('be.branch.get_parent_child') }}',
                data: {
                    id: id
                },
                success: function(result) {
                    $('#show_children').html(result);
                }
            })
        });
    </script>
    <script>
        $('.select_parent').on('change', function() {
            var id_flink = $(this).attr('data-id');
            var id_parent = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ route('be.branch.update_parent') }}',
                data: {
                    id_parent: id_parent,
                    id_flink: id_flink
                },
                success: function(result) {
                    $('#show_children' + id_flink).css('border', '2px solid red').html(result);
                    Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                }
            })
        });
    </script>
    <script>
        $('.select_parent_of_child_parent').on('change', function() {
                var id_flink_child_parent = $(this).attr('data-id');
                var id_parent = $(this).val();
                $.ajax({
                    type: "GET",
                    url: '{{ route('be.branch_category_2.update_parent') }}',
                    data: {
                        id_parent: id_parent,
                        id_flink_child_parent: id_flink_child_parent
                    },
                    success: function(data) {
                         Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                    }
                })
            });
    </script>
    <script>
        $('.select_parent_child').on('change', function() {
            var id_flink = $(this).attr('data-id');
            var id_parent_child = $(this).val();

            $.ajax({
                type: "GET",
                url: '{{ route('be.branch.update_parent_child') }}',
                data: {
                    id_parent_child: id_parent_child,
                    id_flink: id_flink,
                },
                success: function(data) {
                         Toast.fire({
                        icon: 'success',
                        title: 'Cập nhật thành công !'
                        })
                    }
            })
        });
    </script>
    {{-- end ajax cate branch --}}

    <script>
        $('.caching_web').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{ route('caching') }}",
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Đã tối ưu cache !',
                        showConfirmButton: false,
                    })
                }
            });

        });
    </script>
    <script>
        $(".delete-flink").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                success: function(data) {
                    $('.tr_id_'+data.id).empty();
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Đã xóa !',
                        showConfirmButton: false,
                    })
                }
            });

        });
    </script>
    <script>
        $(".form_check_link").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            title: '<strong>Đã kiểm tra xong</strong>',
                            icon: 'success',
                            html: 'Link này <b class="text-success">chưa có</b> trong hệ thống, ' +
                                'Nhấp vào <a href="/admin/link-fshare/add">đây</a> để thêm mới !',
                            showCloseButton: true,
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText: 'Kiểm tra tiếp',
                            confirmButtonAriaLabel: 'Thumbs up, great!',
                            cancelButtonText: 'Xong',
                            cancelButtonAriaLabel: 'Thumbs down'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Link này đã tồn tại trong hệ thống !',
                            footer: '<a href="/admin/link-fshare/edit/' + data.link +
                                '">Đi tới để xem thử ?</a>',
                            showConfirmButton: false,
                        })
                    }


                }
            });

        });
    </script>
    <script>
        var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
        if (has_errors) {
            Swal.fire({
                title: 'Có lỗi !',
                icon: 'error',
                html: jQuery('.show__errors').html(),
                showCloseButton: true,
            });
        }
    </script>
    <script>
        $('.filter_null_url').on('click', function() {
            Swal.fire({
                title: 'Xác nhận lọc LINK ?',
                text: "Quá trình này sẽ tốn kha khá thời gian",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('check_die_url') }}",
                        beforeSend: function() {
                            let timerInterval
                            Swal.fire({
                                title: 'Đang xử lí!',
                                html: 'Vui lòng không tắt trình duyệt.',
                                timerProgressBar: false,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector(
                                        'b')
                                },

                            });
                        },
                        success: function(result) {
                            Swal.fire(
                                'Hoàn thành!',
                                'Đã kiểm tra lại toàn bộ LINK !',
                                'success'
                            )

                        }
                    });

                }
            })
        })
    </script>
    <script>
        $('.filter_short_link').on('click', function() {
        Swal.fire({
            title: 'Kiểm tra Shortlink ?',
            text: "Bổ sung Shortlink cho những link thiếu !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('make_short_link') }}",
                            beforeSend: function() {
                                let timerInterval
                                Swal.fire({
                                    title: 'Đang xử lí!',
                                    html: 'Vui lòng không tắt trình duyệt.',
                                    timerProgressBar: false,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer().querySelector(
                                            'b')
                                    },

                                });
                            },
                            success: function(result) {
                                Swal.fire(
                                    'Hoàn thành!',
                                    result.message,
                                    'success'
                                )

                            }
                        });

                    }
                })
         })
    </script>
    <script>
        $('document').ready(function() {
        $(document).on('keyup', 'input#pass', function() {
            var descriptions = toSlug($(this).val());
            $('span#linkactive').text(descriptions);
        });
        });
    </script>
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
    </script>


    @stack('script')
</body>

</html>
