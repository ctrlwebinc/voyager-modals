@php
    $modals = \Ctrlweb\VoyagerModals\Modal::all();
@endphp
@if($modals->isNotEmpty())
<select
    class="form-control select2-ajax" name="modal"
    data-get-items-route="/admin/modals"
    data-get-items-field="modal"
>
@foreach($modals as $modal)
        <option value="{{ $modal->id }}" @if(isset($dataTypeContent->modal) && $dataTypeContent->modal == $modal->id)selected="selected"@endif>{{ $modal->title }} </option>
@endforeach
</select>
@else
    <span>{{ __('No modal has been created yet.') }}</span>
@endif
