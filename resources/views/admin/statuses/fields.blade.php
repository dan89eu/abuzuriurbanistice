<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-12">
    {!! Form::label('color', 'Color:') !!}
    <input type="text" data-format="hex" class="form-control demo" id="picker4" value="success" name="color"/>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.statuses.index') !!}" class="btn btn-default">Cancel</a>
</div>
