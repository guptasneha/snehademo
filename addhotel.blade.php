<!-- extending code from resources/views/layouts/masterpage.blade.php page-->
@extends('layouts.masterpage')
@section('title', ' Add New Hotel')
<!-- content section -->
@section('content')
<div class="container">
    <div class="row pagecommon">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #0d7506; color: #fff;"><h4>Add New Hotel</h4></div>
                <div class="panel-body">
                    <div class="row">
                        <!--Add Hotels -->
                        <div class="col-md-12">
                            {!! Html::ul($errors->all(), array('class'=>'errors alert alert-danger')) !!}
                            {!! Form::open(array('url' => 'admin/','class'=>'form','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <br>{!! Form::label('name', 'Hotel Name') !!}
                            {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'e.g. The Oberoi')) !!}
                            <br>{!! Form::label('address', 'Hotel Address') !!}
                            {!! Form::textarea('address', null, array('class' => 'form-control','placeholder' => 'e.g. H-20,pocket-2,New Delhi - 110 003')) !!}
                            <br>{!! Form::label('price', 'Hotel Price') !!}
                            {!! Form::text('price', null, array('class' => 'form-control','placeholder' => 'e.g. 6000')) !!}
                            <br>{!! Form::label('image', 'Hotel Image') !!}
                            {!! Form::file('hotelimage', array('class' => 'form-control')) !!}
                            <br>
                            {!! Form::submit('Submit' , array('class' => 'btn btn-primary center-block')) !!}
                            {!! Form::close() !!}
                            <br>
                        </div>
                        <!--/Add Hotels -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- /content section -->