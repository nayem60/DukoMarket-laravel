@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Setting</h2>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <button class="btn btn-success btn-sm float-right mr-4">Export</button>
      <button class="btn btn-success btn-sm float-right mr-4 text-white">Import</button>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Logo</label>
            <div class="row">
              <div class="col-md-8">
                <input type="file" class="form-control" name="logo" >
              </div>
              <div class="col-md-4">
                <img src="{{asset($setting->logo)}}">
              </div>
            </div>
          </div>
           <div class="form-group">
            <label>Icon</label>
            <div class="row">
              <div class="col-md-8">
                <input type="file" class="form-control" name="icon" >
              </div>
              <div class="col-md-4">
                <img src="{{asset( $setting->icon )}}">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label>Email</label>
            <input type="email" value="{{ $setting->email }}" class="form-control" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <label>Number</label>
            <input type="number" value="{{ $setting->number }}" class="form-control" name="number"  placeholder="Number">
          </div>
          <div class="form-group">
            <label>2nd Number</label>
            <input type="number" value="{{ $setting->second_number }}" class="form-control" name="second_number"  placeholder="2nd number">
          </div>
          <div class="form-group">
            <label>Map</label>
            <input type="text" class="form-control" value="{{ $setting->maps }}" name="maps" placeholder="Map">
          </div>
          <div class="form-group">
            <label>Twitter</label>
            <input type="text" class="form-control" value="{{ $setting->twitter }}" name="twitter"  placeholder="twitter">
          </div>
          <div class="form-group">
            <label>Facebook</label>
            <input type="text" class="form-control" value="{{ $setting->facebook }}" name="facebook"  placeholder="facebook">
          </div>
          <div class="form-group">
            <label>Youtoube</label>
            <input type="text" class="form-control" value="{{ $setting->youtoube }}" name="youtoube"  placeholder="youtoube">
          </div>
          <div class="form-group">
            <label>Instragram</label>
            <input type="text" class="form-control" value="{{ $setting->instragram }}" name="instragram"  placeholder="Instragram">
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address"  ></textarea>
          </div>
          <div class="form-group">
            <label>Open Close Detail</label>
            <input type="text" class="form-control" value="{{ $setting->open_close_detail }}" name="open_close_detail"  placeholder="Open Close Detail">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection