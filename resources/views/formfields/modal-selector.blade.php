@php
    $modals = \Ctrlweb\VoyagerPageModals\PageModal::all();
@endphp
@if($modals->isNotEmpty())
<select
    class="form-control select2-ajax" name="modal"
    data-get-items-route="/admin/modals"
    data-get-items-field="modal"
>
@foreach($modals as $modal)
    <option value="{{ $modal->id }}" @if($dataTypeContent->modal == $modal->id)selected="selected"@endif>{{ $modal->name }}</option>
@endforeach
</select>
@else
    <span>{{ __('No modal has been created yet.') }}</span>
@endif
