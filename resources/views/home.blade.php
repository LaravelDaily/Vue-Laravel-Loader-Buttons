@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Contact</div>

                <div class="card-body" id="app">
                    <div class="row">
                        <div class="col-md-6">
                            <loading-button-form></loading-button-form>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
