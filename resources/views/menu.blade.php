<li class="nav-item {{ request()->routeIs('news.index')?'active':''}}">
    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
</li>
<li class="nav-item {{ request()->routeIs('news.category.index')?'active':''}}">
    <a class="nav-link" href="{{ route('news.category.index') }}">Категории</a>
</li>
<li class="nav-item {{ request()->routeIs('about')?'active':''}}">
    <a class="nav-link" href="{{ route('about') }}">О нас</a>
</li>
