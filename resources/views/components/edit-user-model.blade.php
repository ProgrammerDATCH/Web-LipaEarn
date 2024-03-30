<div class="modal fade" id="id-{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button disabled type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="card-header">Edit Info Of {{ $user->username }}</h5>
                <h6>1. Personal Info</h6>
                <div class="row g-3">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="Username">Username</label>
                        <input disabled type="text" id="Username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}" name="username">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="Email">Email</label>
                        <input disabled type="text" id="Email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="number">Phone Number</label>
                        <input disabled type="text" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ $user->number }}" name="number">
                    </div>
                </div>
                <hr class="my-4 mx-n4">
                <h6>2. Account Details</h6>
                <div class="row g-3">
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="income">Income</label>
                        <input disabled type="text" id="income" class="form-control @error('income') is-invalid @enderror" value="{{ $balance->balance ?? 0 }}" name="income">

                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="role">Role</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" disabled>
                            <option value="Standard" {{ $user->role === 'Standard' ? 'selected' : '' }}>Standard</option>
                            <option value="Admin"{{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>

                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="lastname">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" id="exampleFormControlSelect2" aria-label="Default select example" disabled>
                            <option value="Active" {{ $user->status === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Pending"{{ $user->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                </div>
                <div class="pt-4">
                    <a class="btn btn-primary me-sm-3 me-1" href="{{ route('admin.edit', ['username' => $user['username']]) }}">Edit</a>
                </div>
                <hr>
                <h5 class="card-header">Change Password</h5>
                <div class="row">
                    <div class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="password">New Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" disabled type="password" id="password" name="password" placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-sm-6 form-password-toggle fv-plugins-icon-container">
                        <label class="form-label" for="password_confirmation">Confirm New Password</label>
                        <div class="input-group input-group-merge">
                            <input class="form-control" disabled type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div>
                        <a disabled type="submit" class="btn btn-primary me-2" href="{{ route('admin.edit', ['username' => $user['username']]) }}">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials._auth-scripts')
