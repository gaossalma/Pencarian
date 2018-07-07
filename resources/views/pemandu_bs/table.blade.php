<table class="table table-responsive" id="pemanduBs-table">
    <thead>
        <th>Fullname</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Negara</th>
        <th>Tanggal Lahir</th>
        <th>Nomor Tlp</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Password</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pemanduBs as $pemanduB)
        <tr>
            <td>{!! $pemanduB->fullname !!}</td>
            <td>{!! $pemanduB->email !!}</td>
            <td>{!! $pemanduB->jenis_kelamin !!}</td>
            <td>{!! $pemanduB->negara !!}</td>
            <td>{!! $pemanduB->tanggal_lahir !!}</td>
            <td>{!! $pemanduB->nomor_tlp !!}</td>
            <td>{!! $pemanduB->longitude !!}</td>
            <td>{!! $pemanduB->latitude !!}</td>
            <td>{!! $pemanduB->password !!}</td>
            <td>
                {!! Form::open(['route' => ['pemanduBs.destroy', $pemanduB->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pemanduBs.show', [$pemanduB->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pemanduBs.edit', [$pemanduB->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>