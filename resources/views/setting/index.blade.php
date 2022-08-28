@extends('layouts.all')
@section('style')

<style>
    .w-30per{width: 10vh !important;}
    .table-bordered td{padding-left: 10px;padding-right: 10px;}
</style>
@endsection
@section('modal')
<div class="modal fade" id="to_set" tabindex="-1" aria-labelledby="to_setlabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{url('home')}}" class="modal-content" id="form_check">
            @method('PATCH')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="to_setlabel">จัดการ URL <span id="choose"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row m-0">
                    <div class="col-lg-12 p-1"><input type="text" name="url_old" id="url_old" class="form-control" placeholder="URL ....." required></div>
                    <div class="col-lg-12 p-1"><input type="text" name="url_new" id="url_new" class="form-control" placeholder="URL ....." required></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('content')
<div class="row m-0">
    <div class="col-xl-1"></div>
    <div class="col-xl-10">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            @if(Auth::user()->type==1)
                            <td>ผู้สร้าง URL</td>
                            @endif
                            <td class="w-30per">URL เดิม</td>
                            <td>URL ใหม่</td>
                            <td class="text-center">จัดการ</td>
                        </tr>
                        @foreach ($url as $u)
                        <tr>
                            @if(Auth::user()->type==1)
                            <td>{{@$u->name}}</td>
                            @endif
                            <td class="w-30per">{{@$u->url_old}}</td>
                            <td>{{url('')}}/{{(@$u->url_id)}}</td>
                            <td><button class="btn btn-dlc w-100" data-id-url="{{$u->url_uid}}" data-old="{{@$u->url_old}}" data-new="{{(@$u->url_id)}}" data-bs-toggle="modal" data-bs-target="#to_set">SET</button></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-1"></div>
</div>
@endsection
@section('script')
<script>
    $('.btn-dlc').on('click',function(){
        var id = $(this).attr('data-id-url');
        var url = "{{url('setting')}}/"+id
        var old = $(this).attr('data-old')
        var new_u = $(this).attr('data-new')
        $("#form_check").attr('action',url)
        $("#url_old").val(old)
        $("#url_new").val(new_u)
    })
</script>
@endsection
