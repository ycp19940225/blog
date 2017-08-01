<!--PC和WAP自适应版-->
<ul class="list-group article_comments_list">
    <p class=" alert alert-info" id="comments_total"> </p>
    {{--<li class="list-group-item" id="">
        <div class="article_comments_detail" id="article_comments">
            <div class="panel panel-info pull-right" style="width: 80%">
                <div class="panel-body comment-meta">
                    <div class="comment_body col-xs-11 ">
                        <div class="media-heading">
                            <cite>author+'</cite>&nbsp;&nbsp; 发表于&nbsp;&nbsp;
                            <a href="">
                                <time datetime=""><i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;	time+		</time>
                                </a>
                            </div>

                        <div class="media-body markdown-reply content-body">
                            <p>content+'</p>
                              </div>
                         </div>
                     <div class="pull-right">
                        <div class="reply text-right">
                            <a class="" href="JavaScript:void(0);" onclick="" ><i class="fa fa-reply"></i>&nbsp;&nbsp;回复</a></div>
                        </div></div>
                </div>
            </div>
        <div class="clear_float"></div>
    </li>--}}
</ul>
@if(Auth::check())
<div class="article_comments" id="0">
    <div class="panel-body">
        <form action="">
            <p class="comment-notes alert alert-info">评论：</p>
            <input type="hidden" name="parent_id" value="0">
            <input type="hidden" name="article_id" value="{{ $article['id'] }}" >
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" rows="5"  name="content"></textarea>
                </div>
            </div>
            <div class="pull-right" >
                <button type="button" class="btn btn-success do_comments" >发表评论</button>
            </div>
        </form>
    </div>
</div>
    @endif
@if(!Auth::check())
    <div class="article_comments" id="0">
        <p class="comment-notes alert alert-info"> 标记为<span class="required">*</span>的字段是必填项(邮箱地址不会被公开)，<a href="{{ url('blog/auth/index') }}">登陆后</a>&nbsp;则并不需要填写</p>
        <div class="panel-body">
            <form action="">
                <input type="hidden" name="parent_id" value="0">
                <input type="hidden" name="article_id" value="{{ $article['id'] }}" >
                <div class="col-md-5">
                    <div class="form-group comment-form-author">
                        <label class="sr-only control-label" for="author">名字 <span class="required">*</span></label>
                        <div class="input-group">
                <span class="input-group-addon">
                    <span class="fa fa-user"></span></span>
                            <input placeholder="名字 *" class="form-control" id="author" name="author" type="text" value="" size="30" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group comment-form-email">
                        <label class="sr-only control-label" for="email">邮箱 <span class="required">*</span>
                        </label> <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-envelope">
                    </span></span>
                            <input placeholder="邮箱 *" class="form-control" id="email" name="email" type="email" value="" size="30" aria-required="true">
                        </div>
                    </div>
                    <div class="form-group comment-form-url">
                        <label class="sr-only control-label" for="url">站点</label>
                        <div class="input-group"><span class="input-group-addon">
                    <span class="fa fa-globe"></span></span>
                            <input placeholder="站点" class="form-control" id="url" name="url" type="url" value="" size="30">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <textarea class="form-control" rows="6"  name="content"></textarea>
                    </div>
                </div>
                <div class="pull-right" >
                    <button type="button" class="btn btn-success do_comments" >发表评论</button>
                </div>
            </form>
        </div>
    </div>

@endif
