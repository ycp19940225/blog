// JavaScript Document
(function($){
	'use strict';
	
	var _multree  = function(self,option){
		var _this = this;
		this.button = {
			add : document.createElement('button'),
			del : document.createElement('button'),
		};

		this.addDom = function(box,dom){
			$(dom).hide();
			
			dom.append('<div class="sub-room" style="display:none"></div>');
			if($(dom).attr('data-pid')==0){
				$(box).append(dom);
				nbox = box;
			}else{
				var nbox = $(box).find('[data-id="' + $(dom).attr('data-pid') + '"]');
				$(nbox).children('.sub-room').append(dom);
			}
			
			_this.addDownIcon(dom);
		}
		
		this.addDownIcon = function(nbox){
			var downIcon = document.createElement('i');
			$(downIcon).addClass('fa fa-plus-square-o downIcon');//fa-minus-square-o
			$(nbox).children('span').prepend(downIcon);
		}
		
		this.checkParent = function(box,dom){
			//获取到父级元素的data-id
			var id = $(dom).attr('data-pid');
			//var nbox = box;
			//判断元素是否是顶级元素
			if(id==0)return;
			
			//判断容器中是否存在其父级元素
			if($(box).find('[data-id="' + id + '"]').size()!=0)return;
			
			//如果不存在 那么判断其父级元素是否属于最顶级
			var parent = $(dom).parent();
			var n = $(parent).clone();
			n.find('.treeOption').remove();
			
			if(parent.attr('data-pid')!=0){
				_this.checkParent(box,parent);
				$(box).find('[data-id="'+$(parent).attr('data-pid')+'"]').append(n);
			}else{
				$(box).append(n);
			}
		}
		
		//添加Option
		this.addOption = function(){
			var dom;
			$(self).find('option').each(function(i,e){
				dom = _this.optionChange(e);
				_this.addDom(_this.right,$(dom).clone());
				_this.addDom(_this.left,$(dom).clone());
					
			});	
			_this.freshen();	
		}
		
		//刷新
		this.freshen = function(){
			
			//处理显示或者隐藏的元素
			$(_this.left).find('.treeOption').hide();
			$(_this.left).find('.treeOption').each(function(i,e){
				if(!$(e).hasClass('selected')){
					$(e).show();
					$(e).parents('.treeOption').show();
				}
			});
			
			$(_this.right).find('.treeOption').hide();
			$(_this.right).find('.treeOption').each(function(i,e){
				if($(e).hasClass('selected')){
					$(e).show();
					$(e).parents('.treeOption').show();	
				}
			});
			
			//处理暂开按钮
			$(_this.left).find('.sub-room').each(function(){
				if($(this).find('.treeOption').size()==0){
					$(this).parent('.treeOption').find('.downIcon').hide();
				}
			});
			
			$(_this.right).find('.sub-room').each(function(){
				if($(this).find('.treeOption').size()==0){
					$(this).parent('.treeOption').find('.downIcon').hide();
				}
			});
			
			
			
			
			//应用到表单元素上
			$(_this.left).find('.treeOption').each(function(i,e){
				var dataid = $(e).attr('data-id');
				if($(e).hasClass('selected')){
					$(self).find('[data-id="'+dataid+'"]').attr("selected", true);
				}else{
					$(self).find('[data-id="'+dataid+'"]').removeAttr("selected");	
				}
			});	
		}
		
		//option dom转换
		_this.optionChange = function(e){
			var dom = document.createElement('div');
			if($(e).attr('selected'))
				$(dom).addClass('selected');	
			
			if($(e).attr('disabled'))
				$(dom).addClass('disabled');

			if($(e).attr('data-id'))
				$(dom).attr('data-id',$(e).attr('data-id'));
			
			if($(e).attr('data-pid'))
				$(dom).attr('data-pid',$(e).attr('data-pid'));		
			
			$(dom).addClass('treeOption')
			
			$(dom).html('<span class="treeText">' + $(e).html() + '</span>');
			
			return dom;
		}
		
		//给选项添加事件
		this.addOptionEvent = function(){
			var e;
			$(document).on('click','.treeText',function(){
				//过滤掉不可点击状态
				if($(this).parents('.disabled').size()>0)return false;
				e = $(this).parent();
				if($(e).hasClass('disabled'))return;
				
				if($(e).hasClass('choose')){
					$(e).removeClass('choose');
					$(e).find('.treeOption').removeClass('choose');
				}else{
					$(e).addClass('choose');
					$(e).find('.treeOption').addClass('choose');
				}
			});
			
			$(document).on('click','.downIcon',function(){
				
				if($(this).hasClass('fa-plus-square-o')){
					$(this).removeClass('fa-plus-square-o');
					$(this).addClass('fa-minus-square-o');
					//$(this).parents('.treeOption:eq(0)').find('.treeOption').removeClass('fade');
					$(this).parents('.treeOption:eq(0)').children('.sub-room').show();
				}else{
					$(this).addClass('fa-plus-square-o');
					$(this).removeClass('fa-minus-square-o');
					//$(this).parents('.treeOption:eq(0)').find('.treeOption').addClass('fade');
					$(this).parents('.treeOption:eq(0)').children('.sub-room').hide();
				}
				
				
				return false;
			});
		}
		
		//给按钮添加事件
		this.addToolEvent = function(){
			$(_this.button.add).click(function(){
				if($(_this.left).find('.choose').size()==0)return false;
				
				$(_this.left).find('.choose').each(function(i,e){
					$(e).addClass('selected');
					$(_this.right).find('[data-id="' + $(e).attr('data-id') + '"]').addClass('selected');
				});
				_this.freshen();
				return false;
			});
			
			$(_this.button.del).click(function(){
				if($(_this.right).find('.choose').size()==0)return false;
				
				$(_this.right).find('.choose').each(function(i,e){
					$(e).removeClass('selected');
					$(_this.left).find('[data-id="' + $(e).attr('data-id') + '"]').removeClass('selected');
				});
				_this.freshen();
				return false;	
			});
		};
		
		//添加中间的按钮
		this.addTool = function(){
			$(_this.button.add).html('>');
			$(_this.button.del).html('<');
			
			$(_this.button.add).addClass('btn btn-default toolBtnAdd');
			$(_this.button.del).addClass('btn btn-default toolBtnDel');
			
			$(_this.tool).append(_this.button.add);
			$(_this.tool).append(_this.button.del);
			_this.addToolEvent();
		};
		
		//构造函数
		(function(){
			_this.left = document.createElement('div');
			_this.right = document.createElement('div');
			_this.tool = document.createElement('div');

			$(_this.left).addClass('multree treeLeft');
			$(_this.tool).addClass('treeTool');
			$(_this.right).addClass('multree treeRight');
			
			$(_this.left).attr('multiple','multiple');
			$(_this.right).attr('multiple','multiple');
			
			$(self).hide();
			$(self).parent().append(_this.left);
			$(self).parent().append(_this.tool);
			$(self).parent().append(_this.right);
			_this.addTool();
			_this.addOption();
			_this.addOptionEvent();
		})();
	}

	$.fn.mulTree = function(option){
		//var type = $(this).attr('data-type');
		return new _multree(this,option);	
	};
	
})($);

