              <div class="{{ session('error_security') ? 'active' : '' }} tab-pane" id="security">
                <form class="form-horizontal" action="{{ route('mail.update') }}" method="POST">

                  {{ csrf_field() }}

                  <h3>Email</h3>

                  <hr>

                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email"
                        value="{{ $user->email }}" placeholder="Email" disabled>
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('new_email') ? ' has-error' : '' }}">
                    <label for="new_email" class="col-sm-2 control-label">New Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="new_email" name="new_email"
                         placeholder="New Email" required value="{{ old('new_email') }}">
                          @if ($errors->has('new_email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('new_email') }}</strong>
                              </span>
                          @endif
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="new_email_confirmation" class="col-sm-2 control-label">Confirmation</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="new_email_confirmation" name="new_email_confirmation"
                       placeholder="Retype Email" required value="{{ old('new_email_confirmation') }}">
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                    <label for="current_password" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="current_password" name="current_password"
                       placeholder="Password" required>
                       @if ($errors->has('current_password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('current_password') }}</strong>
                              </span>
                          @endif
                      <span class="help-block">
                          you need to enter your password to modify the email <br>
                          after you change your email you need to confirm it.     
                      </span>
                    </div>
                  </div>

                  <hr>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->