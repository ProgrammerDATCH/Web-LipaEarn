<div class="modal fade" id="payuser-{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('PayUserClick', ['receiver_id' => $user->clicker->id, 'account_id'=> $user->account_id]) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Pay Clicker</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Clicker Name</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ $user->clicker->username }}" disabled>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Amount</label>
                            <input type="email" id="emailBasic" class="form-control" value="50 FRW" disabled>
                        </div>
                    </div>
                    <div class="row g-2 mt-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="notice" required />
                            <a href="#">
                                <label class="form-check-label" for="terms-conditions">
                                    Before Send you accept that user has already followed or subscribed your accounts
                                </label>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
</div>
