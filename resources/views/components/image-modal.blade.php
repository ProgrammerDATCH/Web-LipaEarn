<div class="modal fade" id="imageModal-{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content py-1 px-1">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <img src="{{ asset($user->screenshot) }}" alt="screenshot">
        </div>
    </div>
</div>