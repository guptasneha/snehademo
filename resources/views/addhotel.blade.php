@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if( Session::has('message') )
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                    </div>
                    @endif
                    <form action="{{url('add_hotel')}}" method="POST" role="form">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <legend>Add Hotel</legend>
                    
                        <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="">label</label>
                            <input type="text" class="form-control" name="name" 
                            placeholder="Hotel Name">
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('name') }}
                                </strong>
                            </span>
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="">label</label>
                            <input type="text" class="form-control" name="address" 
                            placeholder="Hotel Address">
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('address') }}
                                </strong>
                            </span>
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="">label</label>
                            <input type="text" class="form-control" name="price" 
                            placeholder="Hotel Price">
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('price') }}
                                </strong>
                            </span>
                        </div>
                        
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
