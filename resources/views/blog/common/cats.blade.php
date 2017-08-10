<div class="col-md-3">
    <aside class="panel panel-default">
        <header class="panel-heading">
            文章分类
        </header>
        <div class="panel-body">
            <ul class="list-group">
                @foreach ($cats as $cat)
                <li class="list-group-item ">
                    <a href="{{ url('blog/cat',['cat_id'=>$cat->id]) }}">
                        {{ $cat->name }}
                        &nbsp;<span class="badge">{{ $cat->articles->count() }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </aside>
</div>
