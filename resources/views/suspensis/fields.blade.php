<!--- Ramo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ramo', 'Ramo:') !!}
    {!! Form::text('ramo', null, ['class' => 'form-control']) !!}
</div>

<!--- Motivo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('motivo', 'Motivo:') !!}
    {!! Form::text('motivo', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
