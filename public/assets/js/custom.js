$(document).ready(function(){

	$("#filer-gallery").filer({
		limit: null,
		maxSize: null,
        extensions: ["jpg", "png", "jpeg", "JPG", "PNG", "JPEG", "Png"],
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Kéo và thả hình vào đây</h3> <span style="display:inline-block; margin: 15px 0">hoặc</span></div><a class="jFiler-input-choose-btn blue">Chọn hình</a></div></div>',
		showThumbs: true,
		theme: "dragdropbox",
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid row scroll-bar"></ul>',
            item: '<li class="jFiler-item col-md-3">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-thumb-overlay">\
                                        <div class="jFiler-item-info">\
                                            <div style="display:table-cell;vertical-align: middle;">\
                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                <span class="jFiler-item-others">{{fi-size2}}</span>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li>{{fi-progressBar}}</li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                                <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]" placeholder="Số thứ tự"/>\
                                <input type="text" class="form-control form-control-sm" name="ten-filer[]" placeholder="Tiêu đề"/>\
                            </div>\
                        </div>\
                    </li>',
            itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-thumb-overlay">\
                                            <div class="jFiler-item-info">\
                                                <div style="display:table-cell;vertical-align: middle;">\
                                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                    <span class="jFiler-item-others">{{fi-size2}}</span>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                    <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]" placeholder="Số thứ tự"/>\
                                    <input type="text" class="form-control form-control-sm" name="ten-filer[]" placeholder="Tiêu đề"/>\
                                </div>\
                            </div>\
                        </li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: true,
            canvasImage: false,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
		dragDrop: {
			dragEnter: null,
			dragLeave: null,
			drop: null,
			dragContainer: null,
		},
		uploadFile: {
			url: "../../assets/php/ajax_upload_file.php",
			data: null,
			type: 'POST',
			enctype: 'multipart/form-data',
			synchron: true,
			beforeSend: function(){},
			success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){
				var parent = itemEl.find(".jFiler-jProgressBar").parent(),
					new_file_name = JSON.parse(data),
					filerKit = inputEl.prop("jFiler");
        		filerKit.files_list[id].name = new_file_name;
				itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){
					$("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Thành công</div>").hide().appendTo(parent).fadeIn("slow");
				});
                $.ajax({
                    url: "ajax_save_file",
                    cache: false,
                    data: {
                        name:data,
                    },
			        type: 'GET',
                  });
			},
			error: function(el){
				var parent = el.find(".jFiler-jProgressBar").parent();
				el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
					$("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Lỗi</div>").hide().appendTo(parent).fadeIn("slow");
				});
			},
			statusCode: null,
			onProgress: null,
			onComplete: null
		},
		files: null,
		addMore: true,
		allowDuplicates: true,
		clipBoardPaste: true,
		excludeName: null,
		beforeRender: null,
		afterRender: null,
		beforeShow: null,
		beforeSelect: null,
		onSelect: null,
        afterShow: function(){
            var jFilerItems = $(".my-jFiler-items .jFiler-items-list li.jFiler-item");
            var jFilerItemsLength = 0;
            var jFilerItemsLast = 0;
            if(jFilerItems.length)
            {
                jFilerItemsLength = jFilerItems.length;
                jFilerItemsLast = parseInt(jFilerItems.last().find("input[type=number]").val());
            }
            $(".jFiler-items-list li.jFiler-item").each(function(index){
                var colClass = $(".col-filer").val();
                var parent = $(this).parent();
                if(!parent.is("#jFilerSortable"))
                {
                    jFilerItemsLast += 1;
                    $(this).find("input[type=number]").val(jFilerItemsLast);
                }
                if(!$(this).hasClass(colClass)) $("li.jFiler-item").addClass(colClass);
            });
        },
		onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
			var filerKit = inputEl.prop("jFiler"),
		        file_name = filerKit.files_list[id].name;
                $.get('ajax_delete_file', {file: file_name});
		},
		onEmpty: null,
		options: null,
		dialogs: {
			alert: function(text) {
				return alert(text);
			},
			confirm: function (text, callback) {
				confirm(text) ? callback() : null;
			}
		},
        captions: {
            button: "Thêm hình",
            feedback: "Vui lòng chọn hình ảnh",
            feedback2: "Những hình đã được chọn",
            drop: "Kéo hình vào đây để upload",
            removeConfirmation: "Bạn muốn loại bỏ hình ảnh này ?",
            errors: {
                filesLimit: "Chỉ được upload mỗi lần {{fi-limit}} hình ảnh",
                filesType: "Chỉ hỗ trợ tập tin là hình ảnh có định dạng: {{fi-extensions}}",
                filesSize: "Hình {{fi-name}} có kích thước quá lớn. Vui lòng upload hình ảnh có kích thước tối đa {{fi-maxSize}} MB.",
                filesSizeAll: "Những hình ảnh bạn chọn có kích thước quá lớn. Vui lòng chọn những hình ảnh có kích thước tối đa {{fi-maxSize}} MB."
            }
        },
	});



})
