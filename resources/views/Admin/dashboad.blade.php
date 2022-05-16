@extends('layouts/admin')
@section('title')
    {{$title}}
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$newOrders}}</h3>
  
                  <p>Đơn hàng mới</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$totalProducts}}{{-- <sup style="font-size: 20px"> sản phẩm</sup> --}}</h3>
                  <p>Sản phẩm đang bán</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$outOfStock}}</h3>
                  <p>Sản phẩm sắp hết hàng</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$orderDestroy}}</h3>
                  <p>Đơn bị huỷ</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row" >
          <div class="col-lg-12">
            <div class="card" id="chartline" data-list-day = "{{$listDay}}" data-list-money = "{{$listMoney}}">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Doanh thu trong tháng</h3>
                 {{--  <a href="javascript:void(0);">View Report</a> --}}
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$totalOrder}} Đơn hàng giao thành công</span>
                    <span class="text-bold text-lg">Doanh thu: {{ number_format($totalMoney)}}VNĐ</span>
                  </p>
                 {{--  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> --}}
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class="">
                      </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"><div class=""></div>
                  </div>
                </div>
                  <canvas id="visitors-chart" height="400" width="1504" style="display: block; width: 752px; height: 200px;" class="chartjs-render-monitor"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
          
        </div>
      </div>
     
  </section>
@endsection

@section('css')
    
@endsection
@section('js')
    <script>   
      /* global Chart:false */

 $(function() {
     'use strict'

     var ticksStyle = {
         fontColor: '#495057',
         fontStyle: 'bold'
     }

     var mode = 'index'
     var intersect = true

     /* var $salesChart = $('#sales-chart')
         // eslint-disable-next-line no-unused-vars
     var salesChart = new Chart($salesChart, {
         type: 'bar',
         data: {
             labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
             datasets: [{
                     backgroundColor: '#007bff',
                     borderColor: '#007bff',
                     data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
                 },
                 {
                     backgroundColor: '#ced4da',
                     borderColor: '#ced4da',
                     data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                 }
             ]
         },
         options: {
             maintainAspectRatio: false,
             tooltips: {
                 mode: mode,
                 intersect: intersect
             },
             hover: {
                 mode: mode,
                 intersect: intersect
             },
             legend: {
                 display: false
             },
             scales: {
                 yAxes: [{
                     // display: false,
                     gridLines: {
                         display: true,
                         lineWidth: '4px',
                         color: 'rgba(0, 0, 0, .2)',
                         zeroLineColor: 'transparent'
                     },
                     ticks: $.extend({
                         beginAtZero: true,
 
                         // Include a dollar sign in the ticks
                         callback: function(value) {
                             if (value >= 1000) {
                                 value /= 1000
                                 value += 'k'
                             }
 
                             return '$' + value
                         }
                     }, ticksStyle)
                 }],
                 xAxes: [{
                     display: true,
                     gridLines: {
                         display: false
                     },
                     ticks: ticksStyle
                 }]
             }
         }
     }) */
     let listDay = document.getElementById("chartline").getAttribute("data-list-day");  
     listDay = JSON.parse(listDay);
     let listMoney = document.getElementById("chartline").getAttribute("data-list-Money");  
     listMoney = JSON.parse(listMoney);
     console.log(listMoney);
     var $visitorsChart = $('#visitors-chart')
         // eslint-disable-next-line no-unused-vars
     var visitorsChart = new Chart($visitorsChart, {
         data: {
             labels: listDay,
             datasets: [{
                     type: 'line',
                     data: listMoney,
                     backgroundColor: 'transparent',
                     borderColor: '#007bff',
                     pointBorderColor: '#007bff',
                     pointBackgroundColor: '#007bff',
                     fill: false
                         // pointHoverBackgroundColor: '#007bff',
                         // pointHoverBorderColor    : '#007bff'
                 },
                 /* {
                     type: 'line',
                     data: listMoney,
                     backgroundColor: 'tansparent',
                     borderColor: '#ced4da',
                     pointBorderColor: '#ced4da',
                     pointBackgroundColor: '#ced4da',
                     fill: false
                         // pointHoverBackgroundColor: '#ced4da',
                         // pointHoverBorderColor    : '#ced4da'
                 } */
             ]
         },
         options: {
             maintainAspectRatio: false,
             tooltips: {
                 mode: mode,
                 intersect: intersect
             },
             hover: {
                 mode: mode,
                 intersect: intersect
             },
             legend: {
                 display: false
             },
             scales: {
                 yAxes: [{
                     // display: false,
                     gridLines: {
                         display: true,
                         lineWidth: '4px',
                         color: 'rgba(0, 0, 0, .2)',
                         zeroLineColor: 'transparent'
                     },
                     ticks: $.extend({
                         beginAtZero: true,
                         suggestedMax: 200
                     }, ticksStyle)
                 }],
                 xAxes: [{
                     display: true,
                     gridLines: {
                         display: false
                     },
                     ticks: ticksStyle
                 }]
             }
         }
     })
 })

 // lgtm [js/unused-local-variable]
    </script>
@endsection
