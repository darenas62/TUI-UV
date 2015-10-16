<!--- Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!--- Date Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('date', 'Fecha:') !!}
    {!! Form::date('date', (isset($_GET['date'])) ? $_GET['date'] : null, ['class' => 'form-control']) !!}
</div>

<!--- color Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
