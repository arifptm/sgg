@extends('layouts.app')

@section('content_title')
    <h1>Dashboard</h1>
@endsection

@section('content')


        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">

      <div class="row">
        <div class="col-lg-4 ">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $users->count() }} <small>user</small> / {{ $admins->count() }} <small>admin</small></h3>

              <p>Pengguna aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="/manage/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $products_pending->count()}} <small>Usulan baru</small></h3>

              <p><strong>{{ $products_verified->count() }}</strong> barang sudah di-verifikasi </p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="/manage/products/list-proposal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 ">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $orders -> count() }} <small>Permintaan</small> </h3>

              <p>Menunggu untuk diproses</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
            <a href="/manage/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <!-- ./col -->
      </div>

            </div>
        </div>

<div class="row">
  <div class="col-sm-4">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">User</h3>
      </div>
      <div class="box-body">
        <ul>
          @foreach($allusers as $user)
            <li>{{ $user->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  
  <div class="col-sm-4">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Usulan</h3>
      </div>
      <div class="box-body">
          <ul>
          @foreach($allproducts as $product)
            <li>{{ $product->title }}</li>
          @endforeach
          </ul>
      </div>
    </div>
  </div>

    <div class="col-sm-4">
    <div class="box box-primary">
      <div class="box-header">
          <h3 class="box-title">Permintaan</h3>
      </div>
      <div class="box-body">
        <ul>
          @foreach($allorders as $order)
            <li>{{ $order->user->name }}
              <ul>
                @foreach($order->lineitem as $lorder)
                  <li>{{ $lorder->product->title }}</li>
                @endforeach
              </ul>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

</div>
@endsection