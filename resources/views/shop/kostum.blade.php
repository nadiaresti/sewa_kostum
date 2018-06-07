@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Kostum</li>
                </ul>

            </div>

            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="customer-orders.html"><i class="fa fa-list"></i> Pesanan Saya</a>
                            </li>
                            <li>
                                <a href="customer-orders.html"><i class="fa fa-heart"></i> Wishlist</a>
                            </li>
                            <li>
                                <a href="{{url('/user')}}"><i class="fa fa-user"></i> Profil</a>
                            </li>
                        </ul>
                    </div>

                    <hr>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="customer-orders.html"><i class="fa fa-th-list"></i> Penyewaan</a>
                            </li>
                            <li>
                                <a href="{{url('/user/kostum-add')}}"><i class="fa fa-plus"></i> Tambah Kostum</a>
                            </li>
                            <li class="active">
                                <a href="{{url('/user/kostum')}}"><i class="fa fa-list"></i> Daftar Kostum</a>
                            </li>
                            <li>
                                <a href="{{url('/user/myshop')}}"><i class="fa fa-user"></i> Toko</a>
                            </li>
                        </ul>
                    </div>

                    <hr>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9" style="margin-bottom: 1%">

                {{--<ul class="breadcrumb">--}}
                    <a href="{{url('/user/kostum-add')}}"> <button type="button" class="btn btn-default btn-lg"><i class="fa fa-plus"></i> Tambah Kostum</button></a>
                {{--</ul>--}}

            </div>

            <div class="col-md-9">

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 products-showing">
                            Showing <strong>12</strong> of <strong>25</strong> products
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-sort-by">
                                            <strong>Sort by</strong>
                                            <select name="sort-by" class="form-control">
                                                <option>Price</option>
                                                <option>Name</option>
                                                <option>Sales first</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row products">
                    @if(!empty($data))
                        @foreach($data as $kostum)
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="{{ url('user/detail', [$kostum->id_kostum]) }}">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="{{ url('user/detail', [$kostum->id_kostum]) }}">
                                                    <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="invisible">
                                        <img src="{{url('/').Storage::disk('local')->url("app/".$kostum->gambar_kostum)}}" alt="{{$kostum->nama_kostum}}" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="{{ url('user/detail', [$kostum->id_kostum]) }}">{{$kostum->nama_toko}}</a></h3>
                                        <p class="price">$143.00</p>
                                        <p class="buttons">
                                            <a href="{{ url('user/detail', [$kostum->id_kostum]) }}" class="btn btn-default"><i class="fa fa-edit"></i> Update</a>
                                            <a href="{{route('kostum.del',[$kostum->id_kostum])}}" class="btn btn-primary"><i class="fa fa-eraser"></i> Delete</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <p>Belum Ada Kostum.</p>
                            </div>
                        </div>
                    @endif

                </div>
                <!-- /.products -->

                <div class="pages">

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->

        </div>
    </div>

@endsection