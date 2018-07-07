<table class="table table-responsive" id="histories-table">
    <thead>
        <th>Id Pemandu</th>
        <th>Id Destinasi</th>
        <th>Id Pemandub</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($histories as $history)
        <tr>
            <td>{!! $history->id_pemandu !!}</td>
            <td>{!! $history->id_destinasi !!}</td>
            <td>{!! $history->id_pemanduB !!}</td>
            <td>
                {!! Form::open(['route' => ['histories.destroy', $history->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('histories.show', [$history->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('histories.edit', [$history->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>