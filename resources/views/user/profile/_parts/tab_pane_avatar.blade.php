              <div class="{{ session('error_avatar') ? 'active' : '' }} tab-pane" id="avatar">
                <form class="form-horizontal" action="{{ route('avatar.update') }}" method="POST"
                  enctype="multipart/form-data">

                  {{ csrf_field() }}

                  <div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                    <label for="avatar" class="col-sm-2 control-label">Profile image</label>

                    <div class="col-sm-10">
                      <input type="file"  id="avatar" name="avatar">
                      @if ($errors->has('avatar'))
                          <span class="help-block">
                              <strong>{{ $errors->first('avatar') }}</strong>
                          </span>
                      @endif
                      <span class="help-block">
                        128*128 px
                      </span>
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