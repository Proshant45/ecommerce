<div class="container">
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('patch')

        <div class="card mb-4">
            <div class="card-header bg-light">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', auth()->user()->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                               id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Billing Address</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="billing_address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('billing_address') is-invalid @enderror"
                               id="billing_address" name="billing_address"
                               value="{{ old('billing_address', auth()->user()->billingAddress->address ?? '') }}">
                        @error('billing_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="billing_city" class="form-label">City</label>
                            <input type="text" class="form-control @error('billing_city') is-invalid @enderror"
                                   id="billing_city" name="billing_city"
                                   value="{{ old('billing_city', auth()->user()->billingAddress->city ?? '') }}">
                            @error('billing_city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="billing_state" class="form-label">State</label>
                            <input type="text" class="form-control @error('billing_state') is-invalid @enderror"
                                   id="billing_state" name="billing_state"
                                   value="{{ old('billing_state', auth()->user()->billingAddress->country ?? '') }}">
                            @error('billing_state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="billing_zip" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control @error('billing_zip') is-invalid @enderror"
                                   id="billing_zip" name="billing_zip"
                                   value="{{ old('billing_zip', auth()->user()->billingAddress->zip ?? '') }}">
                            @error('billing_zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Shipping Address</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('shipping_address') is-invalid @enderror"
                               id="shipping_address" name="shipping_address"
                               value="{{ old('shipping_address', auth()->user()->shippingAddress->address ?? '') }}">
                        @error('shipping_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="shipping_city" class="form-label">City</label>
                            <input type="text" class="form-control @error('shipping_city') is-invalid @enderror"
                                   id="shipping_city" name="shipping_city"
                                   value="{{ old('shipping_city', auth()->user()->shippingAddress->city ?? '') }}">
                            @error('shipping_city')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="shipping_state" class="form-label">State</label>
                            <input type="text" class="form-control @error('shipping_state') is-invalid @enderror"
                                   id="shipping_state" name="shipping_state"
                                   value="{{ old('shipping_state', auth()->user()->shippingAddress->country ?? '') }}">
                            @error('shipping_state')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="shipping_zip" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control @error('shipping_zip') is-invalid @enderror"
                                   id="shipping_zip" name="shipping_zip"
                                   value="{{ old('shipping_zip', auth()->user()->shippingAddress->zip ?? '') }}">
                            @error('shipping_zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('profile.update') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>