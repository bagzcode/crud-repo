@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body">
                <!-- let people make clients -->
                <passport-clients></passport-clients>
            </div>
            <div class="card-body">
                <!-- list of clients people have authorized to access our account -->
                <passport-authorized-clients></passport-authorized-clients>
            </div>
            <div class="card-body">
                <!-- make it simple to generate a token right in the UI to play with -->
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
</div>
@endsection


