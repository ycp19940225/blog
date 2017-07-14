<ul class="nav" id="nav">
    <li class="nav-header">菜单</li>
@foreach(config('nav.NAV') as $k=>$v)
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-{{ $v['icon'] }}"></i>
                <span>{{ $v['name'] }}</span>
            </a>
            <ul class="sub-menu">
                @foreach($v['access'] as $access)
                    @if(!checkPri($access['access']))
                        <li ><a href="{{ url($access['access']) }}">{{ $access['name'] }}</a></li>
                    @else
                        @continue
                    @endif
                @endforeach
            </ul>
        </li>
@endforeach
<!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>