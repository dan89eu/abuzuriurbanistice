@extends('admin/layouts/default')

@section('title')
Location
@parent
@stop
{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gmaps/css/examples.css') }}"/>
    <link href="{{ asset('assets/css/pages/googlemaps_custom.css') }}" rel="stylesheet">
    <!--end of page level css-->
    <link href="{{ asset('assets/vendors/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .dropzone .dz-preview .dz-image img {
            width :100%;
        }
    </style>
@stop
@section('content')
@include('core-templates::common.errors')
<section class="content-header">
    <h1>Location</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Locations</li>
        <li class="active">Create Location </li>
    </ol>
</section>
<section class="content paddingleft_right15">
<div class="row">
    <div class="col-sm-12">
     <div class="card panel-primary">
            <div class="card-heading">
                <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create New  Location
                </h4></div>
            <br />
            <div class="card-body">
            {!! Form::open(['route' => 'admin.locations.store']) !!}

                @include('admin.locations.fields')
                <div id="dZUpload" class="dropzone">
                    <div class="dz-default dz-message"></div>
                </div>
                <!-- Submit Field -->
                <div class="form-group col-sm-12 text-center">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('admin.locations.index') !!}" class="btn btn-default">Cancel</a>
                </div>
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
    <script type="text/javascript" src="{{ asset('assets/vendors/dropzone/js/dropzone.js') }}" ></script>
    <script>

	    Dropzone.autoDiscover = false;
	    jQuery(document).ready(function() {

		    var myDropZone = $("#dZUpload").dropzone({
			    url: "{!! URL::to('admin/file/create') !!}",
			    addRemoveLinks: true,
			    acceptedFiles: 'image/*',
			    params: {"_token": '{{ csrf_token() }}'},
		        success: function (file, response) {
                    file.id = jQuery.parseJSON(response).id
				    var imgName = response;

				    file.previewElement.classList.add("dz-success");
				    console.log("Successfully uploaded :" + imgName);
			        $('<input>').attr({
				        type: 'input',
				        name: 'file[]',
				        value: file.id,
				        hidden: true
			        }).appendTo('#dZUpload');
			    },
			    error: function (file, response) {
				    file.previewElement.classList.add("dz-error");
			    },
			    removedfile:function (file){
			    	console.log("file",file)
				    $.ajax({
					    url: "/admin/file/delete",
					    type: "DELETE",
					    data: { "id" : file.id, "_token": '{{ csrf_token() }}' }
				    });
				    $(document).find(file.previewElement).remove();
				    $('input[value="'+file.id+'"]').remove();
                }
		    });
	    });
    </script>
@stop
