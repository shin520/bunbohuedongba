<script type="text/javascript">
	/* Create sort filer */
	var sortable;
	function createSortFiler()
	{
		if($("#jFilerSortable").length)
		{
			sortable = new Sortable.create(document.getElementById('jFilerSortable'),{
				animation: 600,
				swap: true,
				disabled: true,
				// swapThreshold: 0.25,
			    ghostClass: 'ghostclass',
			    multiDrag: true,
				selectedClass: 'selected',
				forceFallback: false,
				fallbackTolerance: 3,
				onEnd: function(){
					/* Get all filer sort */
					listid = new Array();
					jFilerItems = $("#jFilerSortable").find('.my-jFiler-item');
					jFilerItems.each(function(index){
						listid.push($(this).data("id"));
					})

					/* Update number */
					var idmuc = <?=(isset($id) && $id > 0) ? $id : 0?>;
					var com = '<?=(isset($com) && $com != '') ? $com : ''?>';
					var kind = '<?=(isset($act) && $act != '') ? $act : ''?>';
					var type = '<?=(isset($type) && $type != '') ? $type : ''?>';
					var colfiler = $(".col-filer").val();
					var actfiler = $(".act-filer").val();
					$.ajax({
						url: 'ajax/ajax_filer.php',
						type: 'POST',
						dataType: 'json',
						async: false,
						data: {idmuc:idmuc,listid:listid,com:com,kind:actfiler,type:type,colfiler:colfiler,cmd:'updateNumb',hash:'<?=$func->generateHash()?>'},
						success: function(result)
						{
							var arrid = result.id;
							var arrnumb = result.numb;
							for(var i=0;i<arrid.length;i++) $('.my-jFiler-item-'+arrid[i]).find("input[type=number]").val(arrnumb[i]);
						}
					})
				},
			});
		}
	}

	/* Destroy sort filer */
	function destroySortFiler()
	{
		try{var destroy = sortable.destroy();}
		catch(e){}
	}

	/* Refresh filer when complete action */
	function refreshFiler()
	{
		$(".sort-filer, .check-all-filer").removeClass("active");
		$(".sort-filer").attr('disabled',false);
		$(".alert-sort-filer").hide();
		if($(".check-all-filer").find("i").hasClass("fas fa-check-square"))
		{
			$(".check-all-filer").find("i").toggleClass("far fa-square fas fa-check-square");
		}
		$(".my-jFiler-items .jFiler-items-list").find('input.filer-checkbox').each(function(){
			$(this).prop('checked',false);
		});
	}

	/* Refresh filer if empty */
	function refreshFilerIfEmpty()
    {
		var idmuc = <?=(isset($id) && $id > 0) ? $id : 0?>;
		var com = '<?=(isset($com) && $com != '') ? $com : ''?>';
		var type = '<?=(isset($type) && $type != '') ? $type : ''?>';
		var colfiler = $(".col-filer").val();
		var actfiler = $(".act-filer").val();
		var cmd = 'refresh';

		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: 'ajax/ajax_filer.php',
			async: false,
			data: {idmuc:idmuc,com:com,kind:actfiler,type:type,colfiler:colfiler,cmd:cmd,hash:'<?=$func->generateHash()?>'},
			success: function(result)
			{
				$(".jFiler-items-list").first().find(".jFiler-item").remove();
				destroySortFiler();
				$tmp = '<div class="form-group form-group-gallery">'
				+'<label class="label-filer">Album hi???n t???i:</label>'
				+'<div class="action-filer mb-3">'
				+'<a class="btn btn-sm bg-gradient-primary text-white check-all-filer mr-1"><i class="far fa-square mr-2"></i>Ch???n t???t c???</a>'
				+'<button type="button" class="btn btn-sm bg-gradient-success text-white sort-filer mr-1"><i class="fas fa-random mr-2"></i>S???p x???p</button>'
				+'<a class="btn btn-sm bg-gradient-danger text-white delete-all-filer"><i class="far fa-trash-alt mr-2"></i>X??a t???t c???</a>'
				+'</div>'
				+'<div class="alert my-alert alert-sort-filer alert-info text-sm text-white bg-gradient-info"><i class="fas fa-info-circle mr-2"></i>C?? th??? ch???n nhi???u h??nh ????? di chuy???n</div>'
				+'<div class="jFiler-items my-jFiler-items jFiler-row">'
				+'<ul class="jFiler-items-list jFiler-items-grid row scroll-bar" id="jFilerSortable">'
				+result
				+'</ul></div></div>';
				$("#filer-gallery").parents(".form-group").after($tmp);
				createSortFiler();
			}
		});
	}

	/* Delete filer */
	function deleteFiler(string)
	{
		var str = string.split(",");
		var id = str[0];
		var folder = str[1];
		var cmd = 'delete';

		$.ajax({
			type: 'POST',
			url: 'ajax/ajax_filer.php',
			data: {id:id,folder:folder,cmd:cmd}
		});

		$('.my-jFiler-item-'+id).remove();
		if($(".my-jFiler-items ul li").length==0) $(".form-group-gallery").remove();
	}

	/* Delete all filer */
	function deleteAllFiler(folder)
	{
		var listid = "";
		var cmd = 'delete-all';

	    $("input.filer-checkbox").each(function(){
	        if(this.checked) listid = listid+","+this.value;
	    });
	    listid = listid.substr(1);
	    if(listid == "")
	    {
	    	notifyDialog("B???n h??y ch???n ??t nh???t 1 m???c ????? x??a");
	    	return false;
	    }

		$.ajax({
			type: 'POST',
			url: 'ajax/ajax_filer.php',
			data: {listid:listid,folder:folder,cmd:cmd}
		});

		listid = listid.split(",");
		for(var i=0;i<listid.length;i++)
		{
			$('.my-jFiler-item-'+listid[i]).remove();
		}

		if($(".my-jFiler-items ul li").length==0) $(".form-group-gallery").remove();

		refreshFiler();
	}

	/* Push OneSignal */
	function pushOneSignal(url)
	{
		document.location = url;
	}

	/* HoldOn */
	function holdonOpen(theme="sk-rect",text="Text here",backgroundColor="rgba(0,0,0,0.8)",textColor="white")
	{
		var options = {
			theme: theme,
			message: text,
			backgroundColor: backgroundColor,
			textColor: textColor
		};

		HoldOn.open(options);
	}
	function holdonClose()
	{
		HoldOn.close();
	}

	/* Reader image */
	function readImage(inputFile,elementPhoto)
	{
		if(inputFile[0].files[0])
		{
			if(inputFile[0].files[0].name.match(/.(jpg|jpeg|png|gif)$/i))
			{
				var size = parseInt(inputFile[0].files[0].size) / 1024;

				if(size <= 4096)
				{
					var reader = new FileReader();
					reader.onload = function(e){
						$(elementPhoto).attr('src', e.target.result);
					}
					reader.readAsDataURL(inputFile[0].files[0]);
				}
				else
				{
					notifyDialog("Dung l?????ng h??nh ???nh l???n. Dung l?????ng cho ph??p <= 4MB ~ 4096KB");
					return false;
				}
			}
			else
			{
				notifyDialog("H??nh ???nh kh??ng h???p l???");
				return false;
			}
		}
		else
		{
			notifyDialog("D??? li???u kh??ng h???p l???");
			return false;
		}
	}

	/* Photo zone */
	function photoZone(eDrag,iDrag,eLoad)
	{
		if($(eDrag).length)
		{
			/* Drag over */
			$(eDrag).on("dragover",function(){
				$(this).addClass("drag-over");
				return false;
			});

			/* Drag leave */
			$(eDrag).on("dragleave",function(){
				$(this).removeClass("drag-over");
				return false;
			});

			/* Drop */
			$(eDrag).on("drop",function(e){
				e.preventDefault();
				$(this).removeClass("drag-over");

				var lengthZone = e.originalEvent.dataTransfer.files.length;

				if(lengthZone == 1)
				{
					$(iDrag).prop("files", e.originalEvent.dataTransfer.files);
					readImage($(iDrag),eLoad);
				}
				else if(lengthZone > 1)
				{
					notifyDialog("B???n ch??? ???????c ch???n 1 h??nh ???nh ????? upload");
					return false;
				}
				else
				{
					notifyDialog("D??? li???u kh??ng h???p l???");
					return false;
				}
			});

			/* File zone */
			$(iDrag).change(function(){
				readImage($(this),eLoad);
			});
		}
	}

	/* Watermark */
	function toDataURL(url, callback)
	{
		var xhr = new XMLHttpRequest();
		xhr.onload = function()
		{
			var reader = new FileReader();
			reader.onloadend = function()
			{
				callback(reader.result);
			}
			reader.readAsDataURL(xhr.response);
		};
		xhr.open('GET', url);
		xhr.responseType = 'blob';
		xhr.send();
	}
	function previewWatermark()
	{
		$o = $("#form-watermark");
		var formData = new FormData();
		formData.append('file', $('#file')[0].files[0]);
		formData.append('data', $o.serialize());

		$.ajax({
			type:'POST',
			url: "index.php?com=photo&act=save-watermark&type=<?=(isset($type) && $type != '') ? $type : ''?>",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(data){
				Swal.fire({
					imageUrl: "assets/images/ajax-loader.gif",
					customClass: {
						confirmButton: 'btn btn-sm bg-gradient-primary text-sm',
					},
					buttonsStyling: false,
					confirmButtonText: '<i class="fas fa-check mr-2"></i>?????ng ??',
					showClass: {
						popup: 'animated fadeInDown faster'
					},
					hideClass: {
						popup: 'animated fadeOutUp faster'
					}
				})

				toDataURL('index.php?com=photo&act=preview-watermark&type=<?=(isset($type) && $type != '') ? $type : ''?>&position='+data.position+'&img='+data.image+'&watermark='+data.path+'&upload='+data.upload+'&opacity='+data.data.opacity+'&per='+data.data.per+'&small_per='+data.data.small_per+'&min='+data.data.min+'&max='+data.data.max+"&t="+data.time, function(dataUrl){$(".swal2-image").attr("src", dataUrl);})
			},
			error: function(data){
				console.log("error");
			}
		});

		return false;
	}

	$(document).ready(function(){


		<?php if(isset($flagGallery) && $flagGallery == true && isset($gallery) && count($gallery) > 0) { ?>
			/* Sort filer */
			createSortFiler();
		<?php } ?>

		/* Check all filer */
		$('body').on('click','.check-all-filer', function(){
			var parentFiler = $(".my-jFiler-items .jFiler-items-list");
			var input = parentFiler.find('input.filer-checkbox');
			var jFilerItems = $("#jFilerSortable").find('.my-jFiler-item');

			$(this).find("i").toggleClass("far fa-square fas fa-check-square");
			if($(this).hasClass('active'))
			{
				$(this).removeClass('active');
				$(".sort-filer").removeClass("active");
				$(".sort-filer").attr('disabled',false);
				input.each(function(){
					$(this).prop('checked',false);
				});
			}
			else
			{
				sortable.option("disabled",true);
				$(this).addClass('active');
				$(".sort-filer").attr('disabled',true);
				$(".alert-sort-filer").hide();
				$(".my-jFiler-item-trash").show();
				input.each(function(){
					$(this).prop('checked',true);
				});
				jFilerItems.each(function(){
					$(this).find('input').attr('disabled',false);
				});
				jFilerItems.each(function(){
					$(this).removeClass('moved');
				});
			}
		});

		/* Check filer */
		$('body').on('click','.filer-checkbox',function(){
			var input = $(".my-jFiler-items .jFiler-items-list").find('input.filer-checkbox:checked');

			if(input.length) $(".sort-filer").attr('disabled',true);
			else $(".sort-filer").attr('disabled',false);
		})

		/* Sort filer */
		$('body').on('click','.sort-filer', function(){
			var jFilerItems = $("#jFilerSortable").find('.my-jFiler-item');

			if($(this).hasClass('active'))
			{
				sortable.option("disabled",true);
				$(this).removeClass('active');
				$(".alert-sort-filer").hide();
				$(".my-jFiler-item-trash").show();
				jFilerItems.each(function(){
					$(this).find('input').attr('disabled',false);
					$(this).removeClass('moved');
				});
			}
			else
			{
				sortable.option("disabled",false);
				$(this).addClass('active');
				$(".alert-sort-filer").show();
				$(".my-jFiler-item-trash").hide();
				jFilerItems.each(function(){
					$(this).find('input').attr('disabled',true);
					$(this).addClass('moved');
				});
			}
		});

		/* Delete filer */
		$("body").on("click",".my-jFiler-item-trash",function(){
			var id = $(this).data("id");
			var folder = $(this).data("folder");
			var str = id+","+folder;
			confirmDialog("delete-filer","B???n c?? ch???c mu???n x??a h??nh ???nh n??y ?",str);
        });

        /* Delete all filer */
		$("body").on("click",".delete-all-filer",function(){
			var folder = $(".folder-filer").val();
			confirmDialog("delete-all-filer","B???n c?? ch???c mu???n x??a c??c h??nh ???nh ???? ch???n ?",folder);
        });

        /* Hash upload multi filer */
		$("form.validation-form").append('<input type="hidden" name="hash" value="<?=$func->generateHash()?>" />');
		$("#filer-gallery").attr({'data-params':'<?=base64_encode($_SERVER['QUERY_STRING'])?>','data-hash':'<?=$func->generateHash()?>'});

        /* Change info filer */
        $('body').on('change','.my-jFiler-item-info', function(){
			var id = $(this).data("id");
			var info = $(this).data("info");
			var value = $(this).val();
			var idmuc = <?=(isset($id) && $id > 0) ? $id : 0?>;
			var com = '<?=(isset($com) && $com != '') ? $com : ''?>';
			var kind = '<?=(isset($act) && $act != '') ? $act : ''?>';
			var type = '<?=(isset($type) && $type != '') ? $type : ''?>';
			var colfiler = $(".col-filer").val();
			var actfiler = $(".act-filer").val();
			var cmd = 'info';

			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: 'ajax/ajax_filer.php',
				async: false,
				data: {id:id,idmuc:idmuc,info:info,value:value,com:com,kind:actfiler,type:type,colfiler:colfiler,cmd:cmd,hash:'<?=$func->generateHash()?>'},
				success: function(result)
				{
					destroySortFiler();
					$("#jFilerSortable").html(result);
					createSortFiler();
				}
			});

			return false;
        });

		/* Filer */
		$("#filer-gallery").filer({
            limit: null,
            maxSize: null,
            extensions: ["jpg","png","jpeg","JPG","PNG","JPEG","Png"],
            changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>K??o v?? th??? h??nh v??o ????y</h3> <span style="display:inline-block; margin: 15px 0">ho???c</span></div><a class="jFiler-input-choose-btn blue">Ch???n h??nh</a></div></div>',
			theme: "dragdropbox",
            showThumbs: true,
            addMore: true,
            allowDuplicates: false,
            clipBoardPaste: false,
            dragDrop: {
				dragEnter: null,
				dragLeave: null,
				drop: null,
				dragContainer: null
            },
            captions: {
                button: "Th??m h??nh",
                feedback: "Vui l??ng ch???n h??nh ???nh",
                feedback2: "Nh???ng h??nh ???? ???????c ch???n",
                drop: "K??o h??nh v??o ????y ????? upload",
                removeConfirmation: "B???n mu???n lo???i b??? h??nh ???nh n??y ?",
                errors: {
                    filesLimit: "Ch??? ???????c upload m???i l???n {{fi-limit}} h??nh ???nh",
                    filesType: "Ch??? h??? tr??? t???p tin l?? h??nh ???nh c?? ?????nh d???ng: {{fi-extensions}}",
                    filesSize: "H??nh {{fi-name}} c?? k??ch th?????c qu?? l???n. Vui l??ng upload h??nh ???nh c?? k??ch th?????c t???i ??a {{fi-maxSize}} MB.",
                    filesSizeAll: "Nh???ng h??nh ???nh b???n ch???n c?? k??ch th?????c qu?? l???n. Vui l??ng ch???n nh???ng h??nh ???nh c?? k??ch th?????c t???i ??a {{fi-maxSize}} MB."
                }
            },
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
            uploadFile: {
				url: "ajax/ajax_upload.php",
				data: $("#filer-gallery").data(),
				type: 'POST',
				enctype: 'multipart/form-data',
				dataType: 'json',
				async: false,
				beforeSend: function(){
					holdonOpen("sk-rect","Vui l??ng ch???...","rgba(0,0,0,0.8)","white");
				},
				success: function(data, el){
					data = JSON.parse(data);
					if(data['success'] == true)
					{
						var parent = el.find(".jFiler-jProgressBar").parent();
						el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
							$("<div class = \"jFiler-item-others text-success\"><i class = \"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
						});
					}
					else
					{
						var parent = el.find(".jFiler-jProgressBar").parent();
						el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
							$("<div class = \"jFiler-item-others text-error\"><i class = \"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
						});
					}
				},
				error: function(el){
					var parent = el.find(".jFiler-jProgressBar").parent();
					el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
						$("<div class = \"jFiler-item-others text-error\"><i class = \"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
					});
				},
				onComplete: function(){
					refreshFiler();
					if($(".my-jFiler-item-info").length)
					{
						$(".jFiler-items-list").first().find(".jFiler-item").remove();
						$(".my-jFiler-item-info").trigger("change");
					}
					else
					{
						refreshFilerIfEmpty();
					}
					holdonClose();
				},
				statusCode: {},
				onProgress: function(){},
			},
            templates: {
                box: '<ul class="jFiler-items-list jFiler-items-grid row scroll-bar"></ul>',
                item: '<li class="jFiler-item">\
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
                                    <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]" placeholder="S??? th??? t???"/>\
                                    <input type="text" class="form-control form-control-sm" name="ten-filer[]" placeholder="Ti??u ?????"/>\
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
                                        <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]" placeholder="S??? th??? t???"/>\
                                    	<input type="text" class="form-control form-control-sm" name="ten-filer[]" placeholder="Ti??u ?????"/>\
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
            }
        });

		/* Filer import */
		$("#filer-import").filer({
            limit: null,
            maxSize: null,
            extensions: ["jpg","png","jpeg","JPG","PNG","JPEG","Png"],
            changeInput: '<a class="jFiler-input-choose-btn border-primary btn btn-sm bg-gradient-primary text-white mb-3"><i class="fas fa-cloud-upload-alt mr-2"></i>Upload h??nh ???nh</a>',
			theme: "default",
            showThumbs: true,
            addMore: true,
            allowDuplicates: false,
            clipBoardPaste: false,
            captions: {
                button: "Th??m h??nh",
                feedback: "Vui l??ng ch???n h??nh ???nh",
                feedback2: "Nh???ng h??nh ???? ???????c ch???n",
                drop: "K??o h??nh v??o ????y ????? upload",
                removeConfirmation: "B???n mu???n lo???i b??? h??nh ???nh n??y ?",
                errors: {
                    filesLimit: "Ch??? ???????c upload m???i l???n {{fi-limit}} h??nh ???nh",
                    filesType: "Ch??? h??? tr??? t???p tin l?? h??nh ???nh c?? ?????nh d???ng: {{fi-extensions}}",
                    filesSize: "H??nh {{fi-name}} c?? k??ch th?????c qu?? l???n. Vui l??ng upload h??nh ???nh c?? k??ch th?????c t???i ??a {{fi-maxSize}} MB.",
                    filesSizeAll: "Nh???ng h??nh ???nh b???n ch???n c?? k??ch th?????c qu?? l???n. Vui l??ng ch???n nh???ng h??nh ???nh c?? k??ch th?????c t???i ??a {{fi-maxSize}} MB."
                }
            },
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
            templates: {
                box: '<ul class="jFiler-items-list jFiler-items-grid row scroll-bar"></ul>',
                item: '<li class="jFiler-item">\
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
                                    <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]" placeholder="S??? th??? t???"/>\
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
                                        <input type="number" class="form-control form-control-sm mb-1" name="stt-filer[]" placeholder="S??? th??? t???"/>\
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
            }
        });
	});
</script>
