@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body">
                    <?php if(!isset($zeroresult)){?>

                    
                    <h4>Hotel Name <span class="label label-default">
                        {{$hotelname->name}}</span>
                    </h4>
                    @if( Session::has('message') )
                    <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                    </div>
                    @endif
                    @if (sizeof($h_comment))
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        
                        @foreach($h_comment as $key=>$val)
                        <tbody>
                            <tr>
                                <td>{{ $h_comment[$key]->description }}</td>  
                            </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                    @else
                    <p style="color:red;"> No Comment  </p>
                    @endif 
                    @if (Auth::check())
                    <form action="{{url('post_comment')}}" method="POST" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
                        <span class="label label-info">Give any comment to the hotel</span>
                        <div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Comment</label>
                            <textarea class="form-control" rows="3" name="description"></textarea>
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('description') }}
                                </strong>
                            </span>
                        </div>
                      <button type="submit" class="btn btn-default">Post</button>
                    </form>
                    @else
                    <!--login link -->
                        <p>Please click here <a href = "{{ url('/login') }}">Login</a> to post a comments.</p>
                    @endif
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
