<table class="table table-responsive" id="bahasas-table">
    <thead>
        <th>Kode</th>
        <th>Bahasa</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($bahasas as $bahasa)
        <tr>
            <td>{!! $bahasa->kode !!}</td>
            <td>{!! $bahasa->bahasa !!}</td>
            <td>
                {!! Form::open(['route' => ['bahasas.destroy', $bahasa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bahasas.show', [$bahasa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bahasas.edit', [$bahasa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>