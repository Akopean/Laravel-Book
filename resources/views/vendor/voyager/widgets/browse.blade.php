@extends('voyager::master')

@section('page_title', ' Widgets')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
              Widgets
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
                        <div id="left" data-group="left">
                            @foreach(config('widgets')['widgets'] as $widget => $value)
                               @include('admin.widgets.widget', ['widget' => null, 'name' => $widget, 'value' => config('widgets')['widgets'][$widget]])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    @foreach(config('widgets')['group'] as $group => $value)
                        <div class="col-md-6">
                            <h3> {{ $value }} </h3>
                            <div class="widget-inner" data-group="{{ $group }}" id="{{ $group }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop



@section('css')
    @if( config('dashboard.data_tables.responsive'))
        <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
    @endif
@stop


@section('javascript')

    <script type="text/javascript" src="{!! asset('js/admin.js') !!}"></script>
    <script>
        /**
         * Init TinyMCE Editor
         * string el    // element selector
         * object setting // initialization params
         */
      /*  function tinyMceInit(el, setting = {}){
            tinymce.init(Object.assign(setting,{
                menubar: false,
                selector: el,
                skin: 'voyager',
                cache_suffix: '?v=4.1.6',
                min_height: 250,
                resize: 'vertical',
                plugins: 'link, code, lists',
                extended_valid_elements : 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
                setup: function (editor) {
                    editor.on('change', function () {
                        tinymce.triggerSave();
                    })
                },
                toolbar: 'styleselect bold italic underline | link image code',
                convert_urls: false,
            }));
        }
*/
        /**
         *
         */
       /* function tinyMceReInstall(){
            let settings = [];
            let editorIds = [];
            for (let id in window.tinyMCE.editors) {
                editorIds.push(id);
            }

            let editors = $('#' + editorIds.join(', #'));
            console.log(editors);
            editors.each(function() {
                settings[this.id] = window.tinyMCE.get(this.id).settings;
                window.tinyMCE.get(this.id).remove();
            });

            // Re-initialize editors
            editors.each(function() {
                let setting = settings[this.id];
                tinyMceInit('.richTextBox', setting);
            });
        }
*/
        const el = document.getElementById('left');
        // Create Widget Sortable Left Group;
        const sortable = window._sortable.create(el, {
            group: {
                name: 'l',
                animation: 100,
                pull: "clone"
            },
            handle: ".ui-draggable-handle",
            sort: false,
            animation: 100,
            // Element dragging ended
            onEnd: function (evt) {
                const itemEl = evt.item;  // dragged HTMLElement
                const $this = $(evt.to);
                const $that =  $(evt.from);

                //disable  left widget zone  dragging
                if($this.data('group') === 'left'){
                    return false;
                }
/*
                //fix tinyMCE drag disabled
                $(itemEl).find('[data-rich="richTextBox"]').each(function() {
                    let el = 'class' + Math.floor((Math.random() * 1000) + 1);
                    this.setAttribute('class', 'richTextBox ' + el);
                    tinyMceInit('.' + el);
                });
*/
                const data = {
                    'index' : evt.newIndex,
                    'group' : $this.data('group'),
                    'name'  : $(itemEl).data('widget')
                };

                window.axios({
                    method: 'post',
                    url   : '{{ route('admin.widget.create') }}',
                    data  :  data
                })
                .then(function (response) {
                    console.log(response);
                    let data = response.data;
                    if(response.data) {
                        $(itemEl).find('.widgetForm input[name=id]').val(data.id);
                        toastr.success('Saved');
                    }
                    else {
                        toastr.error('Error', error);
                    }
                })
                .catch(function (error) {
                    toastr.error('Error', error);
               });
            }
        });

        // Create Widget Sortable Group;
        @foreach(config('widgets')['group'] as $group => $value)
            window._sortable.create(document.getElementById('{{$group}}'), {
            group: {
                name: 'left',
                put: ['l', 'left']
            },
            animation: 100,
            handle: ".ui-draggable-handle",
            // Element dragging ended
            onEnd: function (evt) {
                const itemEl = evt.item;  // dragged HTMLElement
                const $this = $(evt.to);
                const $that =  $(evt.from);

                if($this.data('group') === $that.data('group')){
                    return false;
                }
/*
                //fix tinyMCE drag disabled
                let settings = [];
                let editorIds = [];
                $this.find('[data-rich="richTextBox"]').each(function() {
                    editorIds.push(this.id);
                    console.log(editorIds);
                });

                let editors = $('#' + editorIds.join(', #'));
                editors.each(function () {
                    settings[this.id] = window.tinyMCE.get(this.id).settings;
                    window.tinyMCE.get(this.id).remove();
                });

                // Re-initialize editors
                editors.each(function () {
                    let setting = settings[this.id];
                    tinyMceInit('.richTextBox', setting);
                });
                */
                const data = {
                    'name'      : $(itemEl).data('widget'),
                    'group'     : $this.data('group'),
                    'oldGroup'  : $that.data('group'),
                    'index'     : evt.newIndex,
                    'oldIndex'  : evt.oldIndex
                };

                window.axios({
                    method: 'post',
                    url   : '{{ route('admin.widget.drag') }}',
                    data  :  data
                })
                .then(function (response) {
                    console.log(response);
                    toastr.success('Saved');
                })
                .catch(function (error) {
                    toastr.error('Error', error);
                 });
            },

            // Changed sorting within list
            onUpdate: function (evt) {
                const itemEl = evt.item;  // dragged HTMLElement
                const $this = $(evt.to);
                const $that = $(evt.from);
/*
                //fix tinyMCE drag disabled
                let settings = [];
                let editorIds = [];
                $this.find('[data-rich="richTextBox"]').each(function() {
                    editorIds.push(this.id);
                });
                console.log('sort', editorIds);
                let editors = $('#' + editorIds.join(', #'));
                editors.each(function () {
                    settings[this.id] = window.tinyMCE.get(this.id).settings;
                    window.tinyMCE.get(this.id).remove();
                });

                // Re-initialize editors
                editors.each(function () {
                    let setting = settings[this.id];
                    tinyMceInit('.richTextBox', setting);
                });
*/
                if($this.data('group') !== $that.data('group')){
                    return false;
                }

                const data = {
                    'name'    : $(itemEl).data('widget'),
                    'group'   : $this.data('group'),
                    'index'   : evt.newIndex,
                    'oldIndex': evt.oldIndex
                };

                window.axios({
                    method: 'post',
                    url   : '{{ route('admin.widget.sort') }}',
                    data  :  data
                })
                .then(function (response) {
                    console.log(response);
                    toastr.success('Saved');
                })
                .catch(function (error) {
                    toastr.error('Error', error);
                 });
            }
        });
        @endforeach

         // Insert Widgets from widget zone
        @foreach(config('widgets')['group'] as $group => $value)
            $html = $('#{{$group}}');
            @foreach(\App\Widget::where('group', '=', $group)->orderBy('index', 'ASC')->get() as $widget)
                $html.append(`@include('admin.widgets.widget', [
                    'id' => $widget['id'],
                    'widget' => json_decode($widget['value']),
                    'name' => $widget['name'],
                    'value' => config('widgets')['widgets'][$widget['name']]
                ])`);
            @endforeach
        @endforeach


        // widget form send
        $('.widgetForm').submit(function(e) {
            const $this = $(this);
            const value = {};

            $this.serializeArray().forEach( function (str) {
                value[str['name']] = str['value'];
            });
            console.log($this.serializeArray());

            const data = {
                'id'    : $this.children('input[name="id"]').val(),
                'value' : JSON.stringify(value)
            };

            window.axios({
                method: 'post',
                cache: false,
                contentType: 'multipart/form-data',
                url   : '{{ route('admin.widget') }}',
                data  : data
            })
                .then(function (response) {
                    console.log('server:', response);

                    /*    // here we will handle errors and validation messages
                     if ( ! data.success) {

                     // handle errors for name ---------------
                     if (data.errors.name) {
                     $('#name-group').addClass('has-error'); // add the error class to show red input
                     $('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                     }

                     // handle errors for email ---------------
                     if (data.errors.email) {
                     $('#email-group').addClass('has-error'); // add the error class to show red input
                     $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                     }

                     // handle errors for superhero alias ---------------
                     if (data.errors.superheroAlias) {
                     $('#superhero-group').addClass('has-error'); // add the error class to show red input
                     $('#superhero-group').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
                     }
                     }
                     */
                    $this.closest('#widget').toggleClass("open");
                    toastr.success('Saved');
                })
                .catch(function (error) {
                    console.log(error);
                    toastr.error('Error', 'Inconceivable!');
                });
            event.preventDefault();
        });
    </script>
@stop
