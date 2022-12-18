<div class="toast toast-{{ $status }} show">
    @switch($status)
        @case('success')
            <i class="bi bi-check-circle"></i>
            @break
        @case('danger')
            <i class="bi bi-x-circle"></i>
            @break
        @default
    @endswitch
    <div class="toast-message">
        <p>{{ $message }}</p>
    </div>
    <i class="bi bi-x icon-close"></i>
</div>
