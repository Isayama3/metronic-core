<div class="avatar avatar-lg me-3" data-bs-toggle="modal" data-bs-target="#image_{{ $record->id }}">
    <img src="{{ $record->image_url }}" alt="Avatar" class="avatar-img">
</div>
<div class="modal fade text-left" id="image_{{ $record->id }}" tabindex="-1" aria-labelledby="myModalLabel140"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="myModalLabel140"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ $record->image_url }}" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>
    </div>
</div>
