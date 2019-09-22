@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">File Upload</div>

                <div class="panel-body">
                  <form method="POST" action="{{ route('file.upload') }}" label="{{ __('Upload') }}">
                    {{ csrf_field() }}

                    <div class="row">
                      <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('File Upload') }}</label>
                        <div class="col-md-6">
                          <div id="file" class="dropzone"></div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                      <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                          <input id="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
                            @if ($errors->has('title'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="row">
                      <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                        <div class="col-md-6">
                          <input id="overview" type="text" class="form-control {{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus />
                            @if ($errors->has('overview'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('overview') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>
                  </br>

                    <div class="form-group row mb-0">
                      <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                          {{ __('Upload') }}
                        </button>
                      </div>
                    </div>
                  </form>

                    @if(session()->get('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <script>
    var zone = new Dropzone('#file', {
      url: "{{ route('upload') }}"
    });
  </script>
@endsection
