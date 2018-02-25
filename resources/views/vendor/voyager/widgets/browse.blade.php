@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' '.$dataType->display_name_plural)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        </h1>
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-4">
                <div class="widget-holder">
                    <div class="sidebar-description">
                        <h3>{{ __('admin.widgets.available') }}</h3>
                        <p class="description">{{ __('admin.widgets.available-desc') }}
                        </p>
                    </div>
                    <div class="widget-list">
                        <div id="left">
                            @foreach(config('widgets')['widgets'] as $widget => $value)
                                <div id="widget" class="widget_clone">
                                    <div class="widget-top" data-toggle="dropdown" aria-expanded="false">
                                        <div class="widget-title-action">
                                            <button type="button" class="widget-action">
                                                <span class="caret"></span>
                                            </button>
                                        </div>
                                        <div class="widget-title ui-draggable-handle">
                                            <h3>{{ $value['placeholder'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="widget-inside row dropdown-menu">
                                        <div class="col-md-12">
                                            <form method="post">
                                                @foreach($value['fields'] as $name => $type)
                                                    @if ($type == "text")
                                                        <input type="text" class="form-control"
                                                               name="{{ $name }}" value="">
                                                    @elseif($type == "text_area")
                                                        <textarea class="form-control"
                                                                  name="{{ $name}}"></textarea>
                                                    @elseif($type == "rich_text_box")
                                                        <textarea class="form-control richTextBox"
                                                                  name="{{ $name }}"></textarea>
                                                    @elseif($type == "image" || $type == "file")
                                                        <input type="file" name="{{ $name }}">
                                                    @endif
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @foreach(config('widgets')['group'] as $group => $value)
                    <h3> {{ $value }} </h3>
                    <div class="widget-inner" id="{{ $group }}">

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop


@section('css')
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
    @endif
@stop


@section('javascript')
    @if(!$dataType->server_side)
        <script type="text/javascript" src="{!! asset('js/admin.js') !!}"></script>
    @endif

    <script>
        var el = document.getElementById('left');
        var sortable = window._sortable.create(el, {
            group: {
                name: 'left',
                animation: 100,
                pull: "clone"
            }
        });
        console.log(sortable);
        @foreach(config('widgets')['group'] as $group => $value)
            window._sortable.create(document.getElementById('{{$group}}'), {
            group: {
                name: 'left',
                put: ['left']
            },
            animation: 100
        });
        @endforeach
    </script>
@stop
