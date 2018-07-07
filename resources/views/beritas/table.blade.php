<table class="table table-responsive" id="beritas-table">
    <thead>
        <th>Judul</th>
        <th>Isi</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($beritas as $berita)
        <tr>
            <td>{!! $berita->judul !!}</td>
            <td>{!! $berita->isi !!}</td>
            <td>
                {!! Form::open(['route' => ['beritas.destroy', $berita->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('beritas.show', [$berita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('beritas.edit', [$berita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>