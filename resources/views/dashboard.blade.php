@extends('layouts.master')
@section('title' , 'Dashboard')
@section('style')
@endsection
@section('content')
<div class="page-wrapper">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
        </div>
    </div>
</div>
</div>
@endsection