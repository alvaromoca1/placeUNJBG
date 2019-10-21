<div class="table-responsive">
    <table class="table" id="restaurantes-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Imges</th>
        <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($restaurantes as $restaurantes)
            <tr>
                <td>{!! $restaurantes->nombre !!}</td>
            <td>{!! $restaurantes->direccion !!}</td>
            <td>{!! $restaurantes->telefono !!}</td>
            <td>{!! $restaurantes->imges !!}</td>
            <td>{!! $restaurantes->descripcion !!}</td>
                <td>
                    {!! Form::open(['route' => ['restaurantes.destroy', $restaurantes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('restaurantes.show', [$restaurantes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('restaurantes.edit', [$restaurantes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
