<div class="container">
    <h3 class="mb-4">Personal Information</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="30%" class="bg-light">Name</th>
                <td>{{ auth()->user()->name }}</td>
            </tr>
            <tr>
                <th class="bg-light">Email</th>
                <td>{{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <th class="bg-light">Phone</th>
                <td>{{ auth()->user()->phone ?? 'Not provided' }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3 class="mb-4 mt-5">Billing Address</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="30%" class="bg-light">Address</th>
                <td>{{ auth()->user()->billingAddress->address ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <th class="bg-light">City</th>
                <td>{{ auth()->user()->billingAddress->city ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <th class="bg-light">State</th>
                <td>{{ auth()->user()->billingAddress->state ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <th class="bg-light">ZIP Code</th>
                <td>{{ auth()->user()->billingAddress->zip ?? 'Not provided' }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3 class="mb-4 mt-5">Shipping Address</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="30%" class="bg-light">Address</th>
                <td>{{ auth()->user()->shippingAddress->address ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <th class="bg-light">City</th>
                <td>{{ auth()->user()->shippingAddress->city ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <th class="bg-light">State</th>
                <td>{{ auth()->user()->shippingAddress->country ?? 'Not provided' }}</td>
            </tr>
            <tr>
                <th class="bg-light">ZIP Code</th>
                <td>{{ auth()->user()->shippingAddress->zip ?? 'Not provided' }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>