<!-- Kode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode', 'Kode:') !!}
    {!! Form::text('kode', null, ['class' => 'form-control']) !!}
</div>

<!-- Bahasa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bahasa', 'Bahasa:') !!}
    {!! Form::text('bahasa', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bahasas.index') !!}" class="btn btn-default">Cancel</a>
</div>
