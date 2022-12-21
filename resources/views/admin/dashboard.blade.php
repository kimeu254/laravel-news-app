@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>
                <div class="card-body">
                    <p class="mb-0">You are logged in as <b>{{Auth::user()->email}}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
