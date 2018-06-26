@extends('admin/layouts/default')

@section('title')
Status
@parent
@stop
@section('header_styles')

    <link href="{{ asset('assets/vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .colorpicker-right:after {
            top: -16px;
        }
    </style>
@stop
@section('content')
@include('core-templates::common.errors')
<section class="content-header">
    <h1>Status</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Statuses</li>
        <li class="active">Create Status </li>
    </ol>
</section>
<section class="content paddingleft_right15">
<div class="row">
    <div class="col-sm-12">
     <div class="card panel-primary">
            <div class="card-heading">
                <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Create New  Status
                </h4></div>
            <br />
            <div class="card-body">
            {!! Form::open(['route' => 'admin.statuses.store']) !!}

                @include('admin.statuses.fields')

            {!! Form::close() !!}
        </div>
      </div>
      </div>
 </div>
</section>
 @stop
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/color-picker.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function() {
                $('input[type=submit]').attr('disabled', 'disabled');
                return true;
            });
        });
    </script>
@stop
