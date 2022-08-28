@extends('layouts.all')
@section('style')


@endsection
@section('modal')
<div class="modal fade" id="to_login" tabindex="-1" aria-labelledby="to_loginlabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="to_loginlabel">แจ้งเตือน</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="" class="text-danger">สร้าง URL จำเป็นต้องเป็นผู้ใช้งานในระบบ</label>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          <a href="{{('login')}}" class="btn btn-primary">ไปยัง Login</a>
        </div>
      </div>
    </div>
</div>
@endsection
@section('content')
<div class="row m-0">
    <div class="col-xl-2"></div>
    <div class="col-xl">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="POST" url="{{ url('home') }}" class="row m-0">
                        @csrf
                        <div class="col-lg p-1"><input type="text" name="url" id="" class="form-control" placeholder="URL ....." value="{{@$url}}" required></div>
                        @if(isset(Auth::user()->type))
                            <div class="col-lg-2 p-1"><button type="submit" class="btn btn-dlc w-100">convert</button></div>
                        @else
                            <div class="col"><button type="button" class="btn btn-dlc w-100" data-bs-toggle="modal" data-bs-target="#to_login">convert</button> </div>
                        @endif
                        @if(isset($alert))
                        <div class="col-lg-12">
                            <b class="text-danger w-100 text-center mt-2">URL นี้ไม่ถูกต้อง</b>
                        </div>
                        @endif
                    </form>
                </div>
            </div>

            @if(isset($id))
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row m-0">
                        <div class="col-lg p-1"><input type="text" id="" value="{{url('')}}/{{$id}}" class="form-control" placeholder="URL ....." readonly></div>
                        <div class="col-lg-2 p-1"><a href="{{url('')}}/{{$id}}" class="btn btn-primary w-100" target="_blank">Go</a></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-xl-2"></div>
</div>
@endsection
@section('script')

@endsection
