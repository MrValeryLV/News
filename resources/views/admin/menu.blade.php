<li class="nav-item {{ request()->routeIs('admin.index')?'active':''}}">
    <a class="nav-link" href="{{ route('admin.index') }}">Все новости</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.create')?'active':''}}">
    <a class="nav-link" href="{{ route('admin.create') }}">Создать новость</a>
</li>
<li class="nav-item {{ request()->routeIs('admin.updateProfile')?'active':''}}">
    <a class="nav-link" href="{{ route('admin.updateProfile') }}">Редактировать профиль</a>
</li>
{{--<li class="nav-item {{ request()->routeIs('admin.downloader')?'active':''}}">--}}
{{--    <a class="nav-link" href="{{ route('admin.downloader') }}">Скачать новость</a>--}}
{{--</li>--}}
