@extends('layouts.user-master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">เพิ่มตัวแทนจำหน่ายสินค้า</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row col-lg-8">
        <div class="panel panel-default">  
            <div class="panel-heading">แบบฟอร์มเพิ่มตัวแทนจำหน่ายสินค้า</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" 
                action="{{ url('/store/dealer') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="dealer_name" 
                            required autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">เบอร์โทรศัพท์</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" name="dealer_tel">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">อีเมลล์</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="dealer_email">
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">รูปภาพ</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control" name="dealer_picture" 
                            accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <button type="submit" class="btn btn-primary">
                                เพื่มตัวแทนจำหน่าย
                            </button>
                        </div>
                    </div>
                </form>
            <!-- /.panel-body -->    
            </div>
        <!-- /.panal -->
        </div>
    <!-- /.row -->
    </div>

@endsection