<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $location->name !!}</p>
    <hr>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $location->description !!}</p>
    <hr>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    <p>{!! $location->formatted_address !!}</p>
    <hr>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status:') !!}
    <p>{!! $location->status->name !!}</p>
    <hr>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Created By:') !!}
    <p>{!! $location->user->full_name !!}</p>
    <hr>
</div>
{!! Form::hidden('place_id', $location->place_id??null, ['class' => 'form-control','id'=>'place_id']) !!}
{!! Form::hidden('lat', $location->lat??null, ['class' => 'form-control','id'=>'lat']) !!}
{!! Form::hidden('lng', $location->lng??null, ['class' => 'form-control','id'=>'lng']) !!}
{!! Form::hidden('formatted_address', $location->formatted_address??null, ['class' => 'form-control','id'=>'formatted_address']) !!}
<!-- User Id Field -->
<div class="form-group">

    <div id="gmap" class="gmap"></div>

</div>



