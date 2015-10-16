<!--- Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!--- Dow Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('dow', 'Dow:') !!}
    {!! Form::select('dow', array(1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 0 => 'Domingo'), null, array('class' => 'form-control', 'size' => 7)) !!}
</div>

<!--- Start Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::time('start', null, ['class' => 'form-control']) !!}
</div>

<!--- End Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('end', 'End:') !!}
    {!! Form::time('end', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
