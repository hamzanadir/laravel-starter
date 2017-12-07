@extends('layouts.dashboard')

@section('header')
<h1>
    User Profile
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
</ol>    
@endsection

@section('content')
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
    @if (session('error_settings'))
      <div class="alert alert-danger">
          {{ session('error_settings') }}
      </div>
    @endif
    @if (session('error_security'))
      <div class="alert alert-danger">
          {{ session('error_security') }}
      </div>
    @endif
    <div class="row">
        <div class="col-md-3">

          @include('user.profile._parts.profile_image')
          @include('user.profile._parts.about_me')
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="{{session('error_settings') || session('error_security')||session('error_avatar') ? '' : 'active' }}"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li class="{{ session('error_settings') ? 'active' : '' }}"><a href="#settings" data-toggle="tab">Settings</a></li>
              <li class="{{ session('error_security') ? 'active' : '' }}"><a href="#security" data-toggle="tab">Security</a></li>
              <li class="{{ session('error_avatar') ? 'active' : '' }}"><a href="#avatar" data-toggle="tab">Profile Image</a></li>
            </ul>
            <div class="tab-content">

                @include('user.profile._parts.tab_pane_activity')
                @include('user.profile._parts.tab_pane_timeline')
                @include('user.profile._parts.tab_pane_settings')
                @include('user.profile._parts.tab_pane_security')
                @include('user.profile._parts.tab_pane_avatar')

              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection