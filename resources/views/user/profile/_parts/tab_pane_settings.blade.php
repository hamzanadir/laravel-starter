              <div class="{{ session('error_settings') ? 'active' : '' }} tab-pane" id="settings">
                <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST">

                  {{ csrf_field() }}

                  <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $user->profile->first_name }}" placeholder="First Name">
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $user->profile->last_name }}" placeholder="Last Name">
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('job') ? ' has-error' : '' }}">
                    <label for="job" class="col-sm-2 control-label">Job</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="job" name="job"
                        value="{{ $user->profile->job }}" placeholder="Job">
                    @if ($errors->has('job'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('bio') ? ' has-error' : '' }}">
                    <label for="bio" class="col-sm-2 control-label">Biography</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="bio" name="bio"
                      placeholder="Biography">{{ $user->profile->bio }}</textarea>
                    @if ($errors->has('bio'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bio') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" name="phone"
                        value="{{ $user->profile->phone }}" placeholder="Phone">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="address" name="address"
                      placeholder="Address">{{ $user->profile->address }}</textarea>
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="city" name="city"
                        value="{{ $user->profile->city }}" placeholder="City">
                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                    <label for="country" class="col-sm-2 control-label">Country</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="country" name="country"
                        value="{{ $user->profile->country }}" placeholder="Country">
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('birth_day') ? ' has-error' : '' }}">
                    <label for="birth_day" class="col-sm-2 control-label">Birth day</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="birth_day" name="birth_day"
                        value="{{ $user->profile->birth_day }}" placeholder="Birth day">
                    @if ($errors->has('birth_day'))
                        <span class="help-block">
                            <strong>{{ $errors->first('birth_day') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('zip_code') ? ' has-error' : '' }}">
                    <label for="zip_code" class="col-sm-2 control-label">Zip code</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="zip_code" name="zip_code"
                        value="{{ $user->profile->zip_code }}" placeholder="Zip code">
                    @if ($errors->has('zip_code'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zip_code') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->