<table class="table table-responsive" id="wisatawans-table">
    <thead>
        <th>Fullname</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Negara</th>
        <th>Tanggal Lahir</th>
        <th>Nomor Tlp</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($wisatawans as $wisatawan)
        <tr>
            <td>{!! $wisatawan->fullname !!}</td>
            <td>{!! $wisatawan->email !!}</td>
            <td>{!! $wisatawan->jenis_kelamin !!}</td>
            <td>{!! $wisatawan->negara !!}</td>
            <td>{!! $wisatawan->tanggal_lahir !!}</td>
            <td>{!! $wisatawan->nomor_tlp !!}</td>
            <td>{!! $wisatawan->longitude !!}</td>
            <td>{!! $wisatawan->latitude !!}</td>
            <td>
                {!! Form::open(['route' => ['wisatawans.destroy', $wisatawan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('wisatawans.show', [$wisatawan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('wisatawans.edit', [$wisatawan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>