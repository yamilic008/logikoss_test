

<li class="{{request()->is('usuario') ? 'active' : ''}}">
    <a href="{{ route('usuario.index') }}">
        <i class="material-icons">person</i>
        <span>Usuarios</span>
    </a>
</li>
<li class="{{request()->is('post') ? 'active' : ''}}">
    <a href="{{ route('post.index') }}">
        <i class="material-icons">person</i>
        <span>Post</span>
    </a>
</li>
