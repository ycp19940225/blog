<?php $__env->startSection('content'); ?>
<!--begin main container-->
<div class="container blog">
    <div id="content" class="row">
        <!--文章-->
        <div class="col-md-9" >
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <article class="panel articles">
                    <div class="content articles_content">
                        <header class="article_header">
                            <div class="article_title ">
                                <h3 class=""><strong><a href="<?php echo e(url('blog/article',['id'=>$v['id']])); ?>"><?php echo e($v['title']); ?></a></strong></h3>
                            </div>
                            <div class="entry-meta text-muted">
                            <span class="posted-on">
                                &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-calendar"></i>
                                Posted on <a href="" rel="bookmark">
                                    <time class="updated" datetime=""><?php echo e(date('Y-m-d',strtotime($v->updated_at))); ?></time>
                                </a>
                            </span>
                                <span class="byline"> by <span class="author vcard">
                                    <i class="glyphicon glyphicon-user">

                                    </i> <a class="url fn n" href=""><?php echo e($v->author->adminname); ?></a>
                                </span>
                            </span>
                            </div>
                        </header>
                        <hr>
                        <div class="article_intro" id="article_intro">
                            <blockquote>
                            <p ><div class=""><?php echo $v['content']; ?></div></p>
                            </blockquote>
                        </div>
                        <footer class="entry-meta article_footer">
                            <p class="visible-xs">
                                <a rel="bookmark" href="<?php echo e(url('blog/article',['id'=>$v['id']])); ?>" class="btn btn-primary btn-block article_read"><i class="glyphicon glyphicon-link"></i> 阅读全文</a>
                            </p>
                            <p class="pull-right hidden-xs">
                                <a rel="bookmark" href="<?php echo e(url('blog/article',['id'=>$v['id']])); ?>" class="btn btn-primary article_read"><i class="glyphicon glyphicon-link"></i> 阅读全文</a>
                            </p>
                            <p class="text-muted hidden-xs meta-data">
                                &nbsp;&nbsp;&nbsp;<span class="cat-links">
					<i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;分类： <a href="http://laravelacademy.org/tutorials/blog" rel="category tag"><?php echo e($v->cat->name); ?>&nbsp;</a>				</span>

                                <span class="tags-links">
					<i class="glyphicon glyphicon-tags"></i> 标签：
                                    <?php $__currentLoopData = $v->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="article_tag" href=""><?php echo e($tag->name); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    &nbsp;&nbsp;&nbsp;<a href="<?php echo e(url('blog/article',['id'=>$v['id']])); ?>" rel="tag">评论</a>				</span>
                                <span class="comments-link">&nbsp;&nbsp;<i class="glyphicon ipt-icon-bubbles2"></i>&nbsp;<a href="<?php echo e(url('blog/article',['id'=>$v['id']])); ?>"><?php echo e($v->comments->where('deleted_at',0)->count()); ?> Comments</a></span>
                            </p>
                            <div class="clearfix"></div>
                        </footer>

                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($articles->links()); ?>

        </div>
        <!--end 文章-->
        <!--content right-->

        <div class="col-md-3 ">
            <div class="panel panel-success">
                <div class="panel-heading">about me</div>
                <div class="panel-body">
                    <p>phper</p>
                    <div class="topic-author-box text-center">
                        <ul class="list-inline">
                            <li class="popover-with-html" data-content="overtrue" data-original-title="" title="">
                                <a href="https://github.com/ycp19940225" target="_blank">
                                    <i class="fa fa-github-alt"></i> GitHub
                                </a>
                            </li>

                            <li class="popover-with-html" data-content="杨春坪" data-original-title="" title="">
                                <a href="http://weibo.com/u/2446608671" rel="nofollow" class="weibo" target="_blank"><i class="fa fa-weibo"></i> Weibo
                                </a>
                            </li>
                            <li class="popover-with-html" data-content="http://yangcp.me" data-original-title="" title="">
                                <a href="http://yangcp.me" rel="nofollow" target="_blank" class="url">
                                    <i class="fa fa-globe"></i> Website
                                </a>
                            </li>
                            <li class="popover-with-html" data-content="http://yangcp.me" data-original-title="" title="">
                                <a href="mailto:820363773@qq.com" rel="nofollow" target="_blank" class="url">
                                    <i class="fa fa-pencil"></i>Contact Me
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!--end content right-->
    </div>
    <!-- begin scroll to top btn -->
    <div style="" id="toTop"><button type="button" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-eject" title="返回顶部"></span></button></div>
    <!-- end scroll to top btn -->
</div>
<!--end main container-->
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('script.js'); ?>
    <script>
        $(function () {
            var oBox=document.getElementsByClassName('article_intro');
            var html = '';
            for(var i=0;i<oBox.length;i++){
                html = oBox[i].innerHTML.substring(0,120)+'...';
                oBox[i].innerHTML = html;
            }

        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('blog.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>