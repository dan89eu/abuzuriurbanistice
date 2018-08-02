<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status_id', 'Status:') !!}
    {!! Form::select('status_id', App\Models\Status::pluck('name','id'), null, ['class' => 'form-control select2', 'required']) !!}
</div>

<!-- Lng Field -->
<div class="form-group col-sm-12">
    <input id="pac-input" class="controls" type="text"
           placeholder="Enter a location">
    <div id="gmap" class="gmap"></div>
</div>

{!! Form::hidden('place_id', $location->place_id??null, ['class' => 'form-control','id'=>'place_id']) !!}
{!! Form::hidden('lat', $location->lat??null, ['class' => 'form-control','id'=>'lat']) !!}
{!! Form::hidden('lng', $location->lng??null, ['class' => 'form-control','id'=>'lng']) !!}
{!! Form::hidden('formatted_address', $location->formatted_address??null, ['class' => 'form-control','id'=>'formatted_address']) !!}
