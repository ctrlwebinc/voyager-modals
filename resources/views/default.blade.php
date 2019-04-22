<div class="modal-wrapper">
    <div class="modal-top-bar">
        <div class="logo-ctn">
            <a href="/"><img src="https://tnm.staging.ctrlweb.ca/images/logos/logo-tnm.png" alt="logo tnm"></a>
        </div>
        <div class="page-title fc-white">
            <h1 itemprop="name">{{ $modal->title }}</h1>
        </div>
        <button class="close-modal btn-rounded bg-white" type="button">
            <img src="https://tnm.staging.ctrlweb.ca/images/icons/close.svg" alt="bouton fermer">
        </button>
    </div>
    <div class="modal-content">
        <div class="modal-main bg-white">
            @foreach($blocks as $block)
                @if (!empty($block->html))
                    @php echo (string)$block->html @endphp
                @else
                    <div class="page-block">
                        <div class="callout alert">
                            <div class="grid-container column text-center">
                                <h2><< !! Warning: Missing Block !! >></h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="div-close-modal"></div>
    </div>
</div>
