@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Hotel</th>
                                <th width="150">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        
                        @foreach($hotel as $key=>$val)
                        
                        <tbody>
                            <tr>
                                <td>{{$hotel[$key]->name}}</td>
                                <td>
                                    <a href="{{url('comments/'.$hotel[$key]->id)}}">
                                        View Comment
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
