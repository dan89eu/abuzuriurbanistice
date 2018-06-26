@extends('admin/layouts/default')

@section('title')
Location
@parent
@stop
{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/timeline.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/timeline2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gmaps/css/examples.css') }}"/>
    <link href="{{ asset('assets/css/pages/googlemaps_custom.css') }}" rel="stylesheet">
    <style>
        ul.list-group:after {
            clear: both;
            display: block;
            content: "";
        }

        .list-group-item {
            float: left;
        }
    </style>
@stop
@section('content')
<section class="content-header">
    <h1>Location View</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Locations</li>
        <li class="active">Location View</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-sm-12">
            <div class="card panel-primary">
                <div class="card-heading clearfix">
                    <h4 class="card-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Location details
                    </h4>
                </div>
                <div class="card-body">
                    @include('admin.locations.show_fields')
                </div>
            </div>
            <div class="form-group">
                <a href="{!! route('admin.locations.index') !!}" class="btn btn-warning mt-2">Back</a>
            </div>
        </div>
    </div>
</section>
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-lg-4">
            <div class="card panel-success">
                <div class="card-heading">
                    <h4 class="card-title">
                        <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i> Change Status ({{ $location->name}})
                    </h4>
                    <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                </div>
                <div class="card-body">

                {!! Form::open(['route' => 'admin.locationStatuses.store']) !!}
                <!-- Status Id Field -->
                    <div class="form-group col-sm-12">
                            {!! Form::select('status_id', App\Models\Status::pluck('name','id'), null, ['class' => 'form-control select2', 'required']) !!}
                    </div>

                    <div class="form-group col-sm-12">

                        {!! Form::hidden('location_id', $location->id??null, ['class' => 'form-control']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name', ]) !!}
                        </div>
                    <div class="form-group col-sm-12">
                        {!! Form::textarea('description', null, ['placeholder' => 'Add some notes', 'class' => 'form-control']) !!}
                        </div>
                            <div class="form-group col-sm-12 text-center">
{!! Form::submit('Update', ['class' => 'btn btn-primary col-sm-12']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card panel-success">
                <div class="card-heading">
                    <h3 class="card-title">
                        <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i> Updates History
                    </h3>
                    <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                        <ul class="timeline">
                            @foreach ($location->statuses as $statuses)
                                @if($loop->iteration  % 2 == 0)
                                    <li class="timeline-inverted">
                                @else
                                    <li>
                                        @endif
                                        <div class="timeline-badge" style="background-color: {{$statuses->color}}">
                                            <i class="livicon" data-name="home" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                        </div>
                                        <div class="timeline-panel" style="display:inline-block;">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Status Changed: <strong>{{ $statuses->name }}</strong></h4>

                                                <p>
                                                    <small class="text-muted">
                                                        {{ $statuses->created_at}}
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="timeline-body">
                                                <h4>
                                                    {{ $statuses->pivot->name}}
                                                </h4>
                                                <p>
                                                    {{ $statuses->pivot->description}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('footer_scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1hWquLT9SvRFXzQsY-iX3X24kt8cxVi8&libraries=places"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/js/gmaps.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('assets/js/pages/custommaps.js') }}"></script>
@stop
