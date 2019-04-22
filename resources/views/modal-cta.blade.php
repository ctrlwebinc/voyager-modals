@php
$modal = \Ctrlweb\VoyagerModals\Modal::find($blockData->modal);
@endphp
<button type="button" class="open-global-modal" data-modal-id="{{ $modal->id }}" data-modal-slug="{{ $modal->slug }}">{{ $blockData->cta_text }}</button>
