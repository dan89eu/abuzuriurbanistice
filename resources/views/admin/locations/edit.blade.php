@extends('admin/layouts/default')

@section('title')
Locations
@parent
@stop
{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gmaps/css/examples.css') }}"/>
    <link href="{{ asset('assets/css/pages/googlemaps_custom.css') }}" rel="stylesheet">
    <!--end of page level css-->
@stop
@section('content')
  @include('core-templates::common.errors')
    <section class="content-header">
     <h1>Locations Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                 Dashboard
             </a>
         </li>
         <li>Locations</li>
         <li class="active">Edit Location </li>
     </ol>
    </section>
    <section class="content paddingleft_right15">
      <div class="row">
             <div class="col-sm-12">
              <div class="card panel-primary">
                    <div class="card-heading">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Edit  Location
                        </h4></div>
                    <br />
                <div class="card-body">
                {!! Form::model($location, ['route' => ['admin.locations.update', collect($location)->first() ], 'method' => 'patch']) !!}

                @include('admin.locations.fields')

                {!! Form::close() !!}
                </div>
              </div>
           </div>
    </div>
   </section>
 @stop
@section('footer_scripts')
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1hWquLT9SvRFXzQsY-iX3X24kt8cxVi8&libraries=places"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/js/gmaps.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('assets/js/pages/custommaps.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
	        $(".select2").select2({
		        theme:"bootstrap",
		        placeholder:"Select a value"
	        });
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop