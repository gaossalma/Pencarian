<table class="table table-responsive" id="bahasaPemandus-table">
    <thead>
        <th>Id Pemandub</th>
        <th>Id Bahasa</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($bahasaPemandus as $bahasaPemandu)
        <tr>
            <td>{!! $bahasaPemandu->id_pemanduB !!}</td>
            <td>{!! $bahasaPemandu->id_bahasa !!}</td>
            <td>
                {!! Form::open(['route' => ['bahasaPemandus.destroy', $bahasaPemandu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('bahasaPemandus.show', [$bahasaPemandu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('bahasaPemandus.edit', [$bahasaPemandu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>