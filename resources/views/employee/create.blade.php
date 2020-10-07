@extends('layouts.app', ['class' => '', 'page' => __('Employee Page'), 'pageSlug' => 'employee'])

@section('content')
<div class="row">
    <div class="col-md-7 mr-auto">
        <div class="card card-register card-white">
            <form class="form" method="post" action="{{ route('employee/create') }}">
                @csrf
                <div class="card-body">
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="firstname" required class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}">
                            @include('alerts.feedback', ['field' => 'firstname'])
                    </div>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="text" name="lastname" required class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}">
                            @include('alerts.feedback', ['field' => 'lastname'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="date" name="dob" required class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Of Birth') }}">
                            @include('alerts.feedback', ['field' => 'dob'])
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="M" required>
                        <label class="form-check-label" for="male">{{ __('Male') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                        <label class="form-check-label" for="female">{{ __('Female') }}</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection