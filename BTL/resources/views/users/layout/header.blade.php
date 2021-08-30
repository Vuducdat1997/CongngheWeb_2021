<?php
use App\Models\Menus;
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}"><img class="logo-header"
                    src="{{asset('user_asset/img/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($menu as $mn)
                    <li
                        class="nav-item dropdown @if(Request::is(''.$mn->menu_url) OR Request::is(''.'category/'.$mn->page_id. '/'. $mn->cateslug .'.html') OR Request::is(''.'new/'.$mn->page_id.'/'. $mn->newslug .'.html') )active @endif">
                        <a class="nav-link nav-border-bottom" href="@if($mn->menu_url) {{url(''.$mn->menu_url)}} 
                            @else @if($mn->type == 'category') {{url('category/'.$mn->page_id. '/'. $mn->cateslug .'.html')}} 
                            @else {{url('new/'.$mn->page_id.'/'. $mn->newslug .'.html')}} 
                            @endif @endif" id="navbarDropdown" role="button" aria-expanded="false">
                            {{$mn->name}}
                        </a>
                        @if($mn->menuchildrent->count())
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <?php 
                            $menuchildrent = Menus::select('menus.*', 'news.slug as newslug', 'categories.slug as cateslug')
                            ->leftJoin('categories', 'categories.id', '=','menus.page_id')
                            ->leftJoin('news', 'news.id', '=','menus.page_id')
                            ->orderBy('menu_order', 'asc')
                            ->where('menus.parent_id', $mn->id)
                            ->take(8)
                            ->get();
                            ?>
                            @foreach($menuchildrent as $menuchild)
                            <li
                                class="menu-2 @if(\Request::is(''.$menuchild->menu_url) OR Request::is(''.'category/'.$menuchild->page_id. '/'. $menuchild->cateslug .'.html') OR Request::is(''.'new/'.$menuchild->page_id.'/'. $menuchild->newslug .'.html'))active @endif">
                                <a class=" dropdown-item" href="@if($menuchild->menu_url) {{url(''.$menuchild->menu_url)}} 
                            @else @if($menuchild->type == 'category') {{url('category/'.$menuchild->page_id. '/'. $menuchild->cateslug .'.html')}} 
                            @else {{url('new/'.$menuchild->page_id.'/'. $menuchild->newslug .'.html')}} 
                            @endif @endif">{{$menuchild->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
<script>
$(document).ready(function() {
    $(window).scroll(function() {
        if ($('body').scrollTop() > 50 || $(window).scrollTop() > 50) {
            $('nav').addClass('nav-menu');
        } else {
            $('nav').removeClass('nav-menu');
        }
    });
});
</script>