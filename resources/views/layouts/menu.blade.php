<li class="{{ Request::is('restaurantes*') ? 'active' : '' }}">
    <a href="{!! route('restaurantes.index') !!}"><i class="fa fa-edit"></i><span>Restaurantes</span></a>
</li>

<li class="{{ Request::is('discotecas*') ? 'active' : '' }}">
    <a href="{!! route('discotecas.index') !!}"><i class="fa fa-edit"></i><span>Discotecas</span></a>
</li>

