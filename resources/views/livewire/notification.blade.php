<div>
    @if($show)
    <div class="alert alert-{{ $type }}" style="position: fixed; top: 1%; right: 1%; z-index: 9999; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        {{ $message }}
    </div>
    @endif
</div>
