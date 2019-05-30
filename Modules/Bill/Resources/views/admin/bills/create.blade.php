@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('bill::bills.title.create bill') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.bill.bill.index') }}">{{ trans('bill::bills.title.bills') }}</a></li>
        <li class="active">{{ trans('bill::bills.title.create bill') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.bill.bill.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('bill::admin.bills.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.bill.bill.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.bill.bill.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
            let url = "<?= route('ajax.product.detail')?>";
            $('#product_id').change(function () {
                let str = {'id': $('#product_id').val()};
                $.post(url,str,function (data) {
                    $('#cost').val(data.cost);
                    $('#ajaxLoadInfo').html('<div class="row" style="margin-top: 20px">\n' +
                        '                <div class="col-md-12"><img src="'+data.image +'" alt=""></div>\n' +
                        '            </div>\n' +
                        '            <div class="row">\n' +
                        '                <div class="col-6"><p style="margin-top: 20px"> Tên SP: '+data.name+'</p></div>\n' +
                        '                <div class="col-6"><p >Đơn giá: '+data.cost+'</p></div>\n' +
                        '            </div>')
                })
            })
            $('#quantity').keyup(function () {
                let totalMoney = $('#quantity').val() * $('#cost').val();
                $('#totalMoney').val(totalMoney)
            })
        });
    </script>
@endpush
