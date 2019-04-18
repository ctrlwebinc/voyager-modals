<style>
    .dd-item {
        margin-left:auto;
        transition: width 0.6s ease;
    }
    .open-close-section .panel-heading, .open-close-demo-menu .panel-heading {
        background-color: #e20300!important;
    }
    .open-close-demo-menu .panel-heading {
        background-color: darkcyan!important;
    }

    .open-close-division .panel-heading {
        background-color: #00E246!important;
    }

    .open-close-division {
        width:96%;
    }
    .open-close-division .panel-heading {
        background-color: #00E246!important;
    }

    .open-close-modal {
        width:92%;
    }

    .open-close-modal .panel-heading {
        background-color: #8A19FF!important;
    }

    .open-close-menu-section {
        width:88%;
    }
    .open-close-menu-section  .panel-heading{
        background-color: #e20300!important;
    }

    .open-close-menu {
        width:88%;
    }
    .open-close-menu  .panel-heading{
        background-color: #FF9100!important;
    }
    .open-close-content {
        width:88%;
    }
    .open-panel {
        width:100%!important;
    }


    .well {
        display: none!important;
    }

</style>
<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
<script>
    // (function($) {
    //     $(document).ready(function() {
    //
    //         $('body').on('click', '.panel-action', function (e) {
    //             e.preventDefault();
    //
    //             if($(this).parents('.panel').hasClass('panel-collapsed')) {
    //
    //
    //                 $(this).parents('.dd-item').removeClass('open-panel');
    //
    //             }else {
    //                 $(this).parents('.dd-item').addClass('open-panel');
    //
    //             }
    //
    //         });
    //
    //     });
    // })(jQuery);
</script>
<?php
switch($block->path) {
    case "block-demo-menu-start":
        $panel_heading_class = 'open-close-demo-menu';
        break;

    case "block-demo-menu-end":
        $panel_heading_class = 'open-close-demo-menu';
        break;

    case "block-menu-start":
        $panel_heading_class = 'open-close-menu';
        break;

    case "block-section-start":
        $panel_heading_class = 'open-close-section';
        break;
    case "block-section-end":
        $panel_heading_class = 'open-close-section';
        break;

    case "block-division-start":
        $panel_heading_class = 'open-close-division';
        break;
    case "block-division-end":
        $panel_heading_class = 'open-close-division';
        break;

    case "block-menu-section-start":
        $panel_heading_class = 'open-close-menu-section';
        break;
    case "block-menu-section-end":
        $panel_heading_class = 'open-close-menu-section';
        break;

    case "block-menu-start":
        $panel_heading_class = 'open-close-menu';
        break;
    case "block-menu-end":
        $panel_heading_class = 'open-close-menu';
        break;

    case "block-modal-default-start":
        $panel_heading_class = 'open-close-modal';
        break;
    case "block-modal-default-end":
        $panel_heading_class = 'open-close-modal';
        break;
    case "block-modal-2-cols-start":
        $panel_heading_class = 'open-close-modal';
        break;
    case "block-modal-2-cols-end":
        $panel_heading_class = 'open-close-modal';
        break;


    default:
        $panel_heading_class = 'open-close-content';
}
?><li class="dd-item {{ $panel_heading_class }}" data-id="{{ $block->id }}" id="block-id-{{ $block->id }}">
    <i class="glyphicon glyphicon-sort order-handle"></i>

    <div class="panel panel-bordered panel-info @if ($block->is_minimized == 1) panel-collapsed @endif">
        <div class="panel-heading ">

            <h3 class="panel-title">
                <a
                    class="panel-action panel-collapse-icon voyager-angle-up"
                    data-toggle="block-collapse"
                    style="cursor:pointer"
                >
                    {{ $template->name }}
                    @if (!empty($template->description)) <span class="panel-desc"> {{ $template->description }}</span>@endif
                </a>
            </h3>
            <div class="panel-actions">
                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
            </div>
        </div>

        <div class="panel-body" @if ($block->is_minimized == 1) style="display:none" @endif>
            <form role="form" action="{{ route('voyager.modal-blocks.update', $block->id) }}" method="POST"
                  enctype="multipart/form-data">
                {{ method_field("PUT") }}
                {{ csrf_field() }}

                <div class="row">
                    @foreach($template->fields as $row)
                        @if ($row->partial === 'break')</div> <!-- /.row --><div class="row"> @continue @endif

                    @php $options = $row; @endphp

                    <div class="@if (strpos($row->partial, 'rich_text_box') !== false)col-md-12 @else col-md-6 @endif">
                        <div class="form-group">
                            <label>{{ $row->display_name }}</label>
                            @php
                                /* For 'multiple images' field - pass through the ID to identify the specific field */
                                $dataTypeContent->id = $row->field;
                                if($row->partial === 'voyager::formfields.media_picker' && isset($row->data_type)) {
                                    $dataType = TCG\Voyager\Models\DataType::where('name', '=', $row->data_type)->first();
                                    $content = '[]';
                                }
                            @endphp
                            @include($row->partial)
                        </div> <!-- /.form-group -->
                    </div> <!-- /.col -->
                    @endforeach
                </div> <!-- /.row -->

                <div class="well" style="padding-bottom:0; margin-bottom:10px">
                    <div class="row">
                        <div class="col-mg-6 col-lg-4">
                            <div class="form-group">
                                <label for="cache_ttl">Cache Time</label>
                                <select name="cache_ttl" id="cache_ttl" class="form-control">
                                    <option value="0" {{ $block->cache_ttl === 0 ? 'selected="selected"' : '' }}>
                                        None / Off
                                    </option>
                                    <option value="5" {{ $block->cache_ttl === 5 ? 'selected="selected"' : '' }}>
                                        5 mins
                                    </option>
                                    <option value="30" {{ $block->cache_ttl === 30 ? 'selected="selected"' : '' }}>
                                        30 mins
                                    </option>
                                    <option value="60" {{ $block->cache_ttl === 60 ? 'selected="selected"' : '' }}>
                                        1 Hour
                                    </option>
                                    <option value="240" {{ $block->cache_ttl === 240 ? 'selected="selected"' : '' }}>
                                        4 Hours
                                    </option>
                                    <option value="1440" {{ $block->cache_ttl === 1440 ? 'selected="selected"' : '' }}>
                                        1 Day
                                    </option>
                                    <option value="10080" {{ $block->cache_ttl === 10080 ? 'selected="selected"' : '' }}>
                                        7 Days
                                    </option>
                                </select>
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col -->

                        <div class="col-mg-6 col-lg-8">
                            <label>Options</label>

                            <div class="row">
                                <div class="col-md-6 col-lg-5">
                                    <div class="form-group">
                                        <input
                                            type="checkbox"
                                            name="is_hidden"
                                            id="is_hidden"
                                            data-name="is_hidden"
                                            class="toggleswitch"
                                            value="1"
                                            data-on="Yes" {{ $block->is_hidden ? 'checked="checked"' : '' }}
                                            data-off="No"
                                        />
                                        <label for="is_hidden"> &nbsp;Hide Block</label>
                                    </div> <!-- /.form-group -->
                                </div> <!-- /.col -->

                                <div class="col-md-6 col-lg-5">
                                    <div class="form-group">
                                        <input
                                            type="checkbox"
                                            name="is_delete_denied"
                                            id="is_delete_denied"
                                            data-name="is_delete_denied"
                                            class="toggleswitch"
                                            value="1"
                                            data-on="Yes" {{ $block->is_delete_denied ? 'checked="checked"' : '' }}
                                            data-off="No"
                                        />
                                        <label for="is_delete_denied"> &nbsp;Prevent Deletion</label>
                                    </div> <!-- /.form-group -->
                                </div> <!-- /.col -->
                            </div> <!-- /.row -->
                        </div> <!-- /.col -->
                    </div> <!-- /.row -->
                </div> <!-- /.well -->

                <span class="btn-group-lg">
                    <button
                        style="float:left"
                        type="submit"
                        class="btn btn-success btn-lg save"
                    >{{ __('voyager::generic.save') }} This Block</button>
                </span>
            </form>

            @if (!$block->is_delete_denied)
                <form method="POST" action="{{ route('voyager.modal-blocks.destroy', $block->id) }}">
                    {{ method_field("DELETE") }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <span class="btn-group-xs">
                        <button
                            data-delete-block-btn
                            type="submit"
                            style="float:right; margin-top:22px"
                            class="btn btn-danger btn-xs delete"
                        >{{ __('voyager::generic.delete') }} This Block</button>
                    </span>
                </form>
            @endif
        </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
</li> <!-- /.dd-item -->
