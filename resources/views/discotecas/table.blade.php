<div class="table-responsive">
    <table class="table" id="discotecas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Descripcion</th>
        <th>Images</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($discotecas as $discotecas)
            <tr>
                <td>{!! $discotecas->nombre !!}</td>
            <td>{!! $discotecas->direccion !!}</td>
            <td>{!! $discotecas->telefono !!}</td>
            <td>{!! $discotecas->descripcion !!}</td>
            <td>{!! $discotecas->images !!}</td>
                <td>
                    {!! Form::open(['route' => ['discotecas.destroy', $discotecas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('discotecas.show', [$discotecas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('discotecas.edit', [$discotecas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
