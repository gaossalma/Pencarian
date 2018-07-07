<table class="table table-responsive" id="destinasis-table">
    <thead>
        <th>Kode</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($destinasis as $destinasi)
        <tr>
            <td>{!! $destinasi->kode !!}</td>
            <td>{!! $destinasi->nama !!}</td>
            <td>{!! $destinasi->deskripsi !!}</td>
            <td>{!! $destinasi->longitude !!}</td>
            <td>{!! $destinasi->latitude !!}</td>
            <td>
                {!! Form::open(['route' => ['destinasis.destroy', $destinasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('destinasis.show', [$destinasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('destinasis.edit', [$destinasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>