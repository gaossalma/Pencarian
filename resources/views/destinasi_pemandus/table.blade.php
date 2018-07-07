<table class="table table-responsive" id="destinasiPemandus-table">
    <thead>
        <th>Id Pemandub</th>
        <th>Id Destinasi</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($destinasiPemandus as $destinasiPemandu)
        <tr>
            <td>{!! $destinasiPemandu->id_pemanduB !!}</td>
            <td>{!! $destinasiPemandu->id_destinasi !!}</td>
            <td>
                {!! Form::open(['route' => ['destinasiPemandus.destroy', $destinasiPemandu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('destinasiPemandus.show', [$destinasiPemandu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('destinasiPemandus.edit', [$destinasiPemandu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>