@php
    $modals = \Ctrlweb\VoyagerModals\Modal::all();
@endphp
@if($modals->isNotEmpty())
<select
    class="form-control select2-ajax" name="{{ $row->field }}"
    data-get-items-route="/admin/modals/all"
>
@foreach($modals as $modal)
    <option value="{{ $modal->id }}" @if(isset($dataTypeContent->{$row->field}) && $dataTypeContent->{$row->field} == $modal->id)selected="selected"@endif>{{ $modal->title }}</option>
@endforeach
</select>
@else
    <span>{{ __('No modal has been created yet.') }}</span>
@endif
