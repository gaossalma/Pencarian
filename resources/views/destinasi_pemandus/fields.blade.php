<!-- Id Pemandub Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pemanduB', 'Id Pemandub:') !!}
    {!! Form::text('id_pemanduB', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Destinasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_destinasi', 'Id Destinasi:') !!}
    {!! Form::text('id_destinasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('destinasiPemandus.index') !!}" class="btn btn-default">Cancel</a>
</div>
