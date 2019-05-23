@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('product::products.title.products') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('product::products.title.products') }}</li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.product.product.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('product::products.button.create product') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header text-center">
                    <button id="line" class="btn">Line</button>
                    <button id="bar" class="btn">Bar</button>
                    <button id="pie" class="btn">Pie</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <canvas id="myChart"></canvas>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('product::products.title.create product') }}</dd>
    </dl>
@stop

@push('js-stack')
    <?php $locale = locale(); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript">
        $(function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Biểu đồ thống kê',
                        // backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45]
                    }]
                },
                // Configuration options go here
                options: {}
            });
            $('#line').on('click', function () {
                $('#myChart').remove();
                $('.box-body').append('<canvas id="myChart"><canvas>');
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Biểu đồ thống kê',
                            // backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [0, 10, 5, 2, 20, 30, 45]
                        }]
                    },
                    // Configuration options go here
                    options: {}
                });
            });
            //bar
            $('#bar').on('click', function () {
                $('#myChart').remove();
                $('.box-body').html('<canvas id="myChart"><canvas>');
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Biểu đồ thống kê',
                            // backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [0, 10, 5, 2, 20, 30, 45]
                        }]
                    },
                    // Configuration options go here
                    options: {}
                });
            });
            //pie
            $('#pie').on('click', function () {
                $('#myChart').remove();
                $('.box-body').html('<canvas id="myChart"><canvas>');
                var ctx = document.getElementById('myChart').getContext('2d');
                ctx.clearRect(0,0,0,0);
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'pie',

                    // The data for our dataset
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Biểu đồ thống kê',
                            backgroundColor: ['rgb(255, 99, 132)','red','blue','yellow','green','cyanogen'],
                            borderColor: 'rgb(255, 99, 132)',
                            data: [0, 10, 5, 2, 20, 30, 45]
                        }]
                    },
                    // Configuration options go here
                    options: {}
                });
            })
        });
    </script>
@endpush
