@props(['title' => 'Add new', 'id' => 'drawer-offcanvas', 'ariaLabel' => 'drawer-offcanvas-label'])
<div class="offcanvas offcanvas-end offcanvas-width-80" tabindex="-1" id="{{ $id }}"
     aria-labelledby="{{ $ariaLabel }}">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel1">{{ $title }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="x-drawer-content">
        {{ $slot }}
    </div>
</div>
