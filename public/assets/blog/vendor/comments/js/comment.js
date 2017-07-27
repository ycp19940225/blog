function Comment(options){
    this.belong = options.id;
    this.getCmtUrl = options.getCmtUrl;
    this.setCmtUrl = options.setCmtUrl;
    this.lists = [];
    this.keys = {};
    this.offset = 5;
}

Comment.allocate = function(options){
    var oCmt = new Comment(options);
    if (oCmt.belong == undefined || !oCmt.getCmtUrl || !oCmt.setCmtUrl) {
        return null;
    };
    oCmt.init(options);
    return oCmt;
};

var fn = Comment.prototype;

fn.initNode = function(options){
    //init wrapper box
    if (!!options.parent) {
        this.parent = options.parent[0].nodeType == 1 ? options.parent : $('#' + options.parent);
    };
    if (!this.parent) {
        this.parent = $('div');
        $('body').append(this.parent);
    }
    //init content
    this.body = (function(){
        var strHTML = '<div class="m-comment">' +
                          '<div class="cmt-form">' +
                              '<textarea class="cmt-text" placeholder="欢迎建议，提问题，共同学习！"></textarea>' +
                              '<button class="u-button u-login-btn">提交评论</button>' +
                          '</div>' +
                          '<div class="cmt-content">' +
                              '<div class="u-loading1"></div>' +
                              '<div class="no-cmt">暂时没有评论</div>' +
                              '<ul class="cmt-list"></ul>' +
                              '<div class="f-clear">' +
                                  '<div class="pager-box"></div>' +
                              '</div>' +
                          '</div>' +
                      '</div>';
        return $(strHTML);
    })();
    //init other node
    this.text = this.body.find('.cmt-text').eq(0);
    this.cmtBtn = this.body.find('.u-button').eq(0);
    this.noCmt = this.body.find('.no-cmt').eq(0);
    this.cmtList = this.body.find('.cmt-list').eq(0);
    this.loading = this.body.find('.u-loading1').eq(0);
    this.pagerBox = this.body.find('.pager-box').eq(0);
};
fn.initEvent = function () {
    this.cmtBtn.on('click', this.addCmt.bind(this, this.cmtBtn, this.text, 0));
    this.cmtList.on('click', this.doClickResponse.bind(this));
};
fn.init = function (options) {
    //初始化node
    this.initNode(options);
    //将内容放进容器
    this.parent.html(this.body);
    //初始化事件
    this.initEvent();
    //获取列表
    this.getList();
};
/**
 * 初始化列表
 */
fn.resetList = function(){
    this.loading.css('display', 'block')
    this.noCmt.css('display', 'none');
    this.cmtList.html('');
};
/**
 * 获取评论列表
 */
fn.getList = function(){

    var self = this;
    this.resetList();

    $.ajax({
        url: self.getCmtUrl,
        type: 'get',
        dataType: 'json',
        data: { id: self.belong },
        success: function(data){
            if(!data){
                alert('获取评论列表失败');
                return !1;
            };
            //整理评论列表
            self.initList(data);
            self.loading.css('display', 'none');
            //显示评论列表
            if(self.lists.length == 0){
                //暂时没有评论
                self.noCmt.css('display', 'block');
            }else{
                //设置分页器
                var total = Math.ceil(self.lists.length / self.offset);

                self.pager = new Pager({
                    index: 1,
                    total: total,
                    parent: self.pagerBox[0],
                    onchange: self.doChangePage.bind(self),
                    label:{
                        prev: '<',
                        next: '>'
                    }
                });

            }
        },
        error: function(){
            alert('获取评论列表失败');
        }
    });
};
/**
 * 换页
 */
fn.doChangePage = function (obj) {
    this.showList(obj.index);
};
/**
 * 处理评论列表
 */
fn.initList = function (data) {

    this.lists = [];   //保存评论列表
    this.keys = {};   //保存评论id和index对应表

    var index = 0;
    //遍历处理
    for(var i = 0, len = data.length; i < len; i++){

        var t = data[i],
            id = t['id'];
        if(t['parent'] == 0){
            this.keys[id] = index++;
            this.lists.push(t);
        }else{
            var parentId = t['parent'],
                parentIndex = this.keys[parentId];
            this.lists[parentIndex]['response'].push(t);
        }

    };
};
/**
 * 显示评论列表
 */
fn.showList = (function(){

    /* 生成一条评论字符串 */
    function oneLi(_obj){

        var str1 = '';
        //处理回复
        for(var i = 0, len = _obj.response.length; i < len; i++){

            var t = _obj.response[i];
            t.content = t.content.replace(/\&lt\;/g, '<');
            t.content = t.content.replace(/\&gt\;/g, '>');
            str1 += '<li class="f-clear"><table><tbody><tr><td>' +
                '<span class="username">' + t.username + '：</span></td><td>' +
                '<span class="child-content">' + t.content + '</span></td></tr></tbody></table>' +
                '</li>'
        }
        //处理评论
        var headImg = '';
        if(_obj.username == "kang"){
            headImg = 'kang_head.jpg';
        }else{
            var index = Math.floor(Math.random() * 6) + 1;
            headImg = 'head' + index + '.jpg'
        }
        _obj.content = _obj.content.replace(/\&lt\;/g, '<');
        _obj.content = _obj.content.replace(/\&gt\;/g, '>');
        var str2 = '<li class="f-clear">' +
            '<div class="head g-col-1">' +
            '<img src="./img/head/' + headImg + '" width="100%"/>' +
            '</div>' +
            '<div class="content g-col-19">' +
            '<div class="f-clear">' +
            '<span class="username f-float-left">' + _obj.username + '</span>' +
            '<span class="time f-float-left">' + _obj.time + '</span>' +
            '</div>' +
            '<span class="parent-content">' + _obj.content + '</span>' +

            '<ul class="child-comment">' + str1 + '</ul>' +
            '</div>' +
            '<div class="respone-box g-col-2 f-float-right">' +
            '<a href="javascript:void(0);" class="f-show response" data-id="' + _obj.id + '">[回复]</a>' +
            '</div>' +
            '</li>';

        return str2;

    };


    return function (page) {

        var len = this.lists.length,
            end = len - (page - 1) * this.offset,
            start = end - this.offset < 0 ? 0 : end - this.offset,
            current = this.lists.slice(start, end);
        var cmtList = '';
        for(var i = current.length - 1; i >= 0; i--){
            var t = current[i],
                index = this.keys[t['id']];
            current[i]['index'] = index;
            cmtList += oneLi(t);
        }
        this.cmtList.html(cmtList);
    };
})();
fn.addCmt = function (_btn, _text, _parent) {
    //防止多次点击
    if(_btn.attr('data-disabled') == 'true') {
        return !1;
    }
    //处理提交空白
    var value = _text.val().replace(/^\s+|\s+$/g, '');
    value = value.replace(/[\r\n]/g,'<br >');
    if(!value){
        alert('内容不能为空');
        return !1;
    }
    //禁止点击
    _btn.attr('data-disabled','true');
    _btn.html('评论提交中...');
    //提交处理
    var self = this,
        email, username;

    username = $.cookie('user');
    if (!username) {
        username = '游客';
    }
    email = $.cookie('email');
    if (!email) {
        email = 'default@163.com';
    }

    var now = new Date();

    $.ajax({
        type: 'get',
        dataType: 'json',
        url: this.setCmtUrl,
        data: {
            belong: self.belong,
            parent: _parent,
            email: email,
            username: username,
            content: value
        },
        success: function(_data){
            //解除禁止点击
            _btn.attr('data-disabled', '');
            _btn.html('提交评论');
            if (!_data) {
                alert('评论失败，请重新评论');
                return !1;
            }
            if (_data['result'] == 1) {
                //评论成功
                alert('评论成功');
                var id = _data['id'],
                    time = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate() + ' ' +
                        now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();

                if (_parent == 0) {

                    var index = self.lists.length;

                    if (!self.pager) {
                        //设置分页器
                        self.noCmt.css('display', 'none');
                        var total = Math.ceil(self.lists.length / self.offset);

                        self.pager = new Pager({
                            index: 1,
                            total: total,
                            parent: self.pagerBox[0],
                            onchange: self.doChangePage.bind(self),
                            label:{
                                prev: '<',
                                next: '>'
                            }
                        });
                    }

                    self.keys[id] = index;
                    self.lists.push({
                        "id": id,
                        "username": username,
                        "time": time,
                        "content": value,
                        "response": []
                    });
                    self.showList(1);
                    self.pager._$setIndex(1);

                 }else {
                    var index = self.keys[_parent],
                        page = self.pager.__index;
                    self.lists[index]['response'].push({
                        "id": id,
                        "username": username,
                        "time": time,
                        "content": value
                    });
                    self.showList(page);
                }

                self.text.val('');
            } else {
                alert('评论失败，请重新评论');
            }
        },
        error: function () {
            alert('评论失败，请重新评论');
            //解除禁止点击
            _btn.attr('data-disabled', '');
            _btn.html('提交评论');
        }
    });
}
fn.doClickResponse = function(_event){

    var target = $(_event.target);

    var id = target.attr('data-id');

    if (target.hasClass('response') && target.attr('data-disabled') != 'true') {
        //点击回复
        var oDiv = document.createElement('div');
        oDiv.className = 'cmt-form';
        oDiv.innerHTML = '<textarea class="cmt-text" placeholder="欢迎建议，提问题，共同学习！"></textarea>' +
            '<button class="u-button resBtn" data-id="' + id + '">提交评论</button>' +
            '<a href="javascript:void(0);" class="cancel">[取消回复]</a>';
        target.parent().parent().append(oDiv);
        oDiv = null;
        target.attr('data-disabled', 'true');
    } else if (target.hasClass('cancel')) {
        //点击取消回复

        var ppNode = target.parent().parent(),
            oRes = ppNode.find('.response').eq(0);
        target.parent().remove();
        oRes.attr('data-disabled', '');
    } else if (target.hasClass('resBtn')) {
        //点击评论
        var oText = target.parent().find('.cmt-text').eq(0),
            parent = target.attr('data-id');
        this.addCmt(target, oText, parent);

    }else{
        //其他情况
        return !1;
    }

};