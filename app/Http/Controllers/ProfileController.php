<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\ProfileUpdateRequest;
    use App\Models\Address;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\View\View;

    class ProfileController extends Controller
    {
        /**
         * Display the user's profile form.
         */

        public function index()
        {
            $user = Auth::user();
            return view('frontend.profile', ['user' => $user]);
        }

        public function edit(Request $request): View
        {
            return view('frontend.setting', [
                'user' => $request->user(),
            ]);
        }

        /**
         * Update the user's profile information.
         */
        public function update(ProfileUpdateRequest $request): RedirectResponse
        {

            $user_data = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required',
                ]
            );


            $user = auth()->user();


            $user->update(
                [
                    'name' => $user_data['name'],
                    'email' => $user_data['email'],
                    'phone' => $user_data['phone'],
                ]);

            $billing_address = $request->validate([
                    'billing_address' => 'required',
                    'billing_city' => 'required',
                    'billing_state' => 'required',
                    'billing_zip' => 'required',
                ]
            );

            Address::updateOrCreate(
                ['user_id' => $user->id, 'address_type' => 'billing'],
                [
                    'phone' => $user_data['phone'],
                    'email' => $user_data['email'],
                    'address' => $request->billing_address,
                    'city' => $request->billing_city,
                    'country' => $request->billing_state,
                    'zip' => $request->billing_zip,
                ]
            );


            $shipping_address = $request->validate([
                    'shipping_address' => 'required',
                    'shipping_city' => 'required',
                    'shipping_state' => 'required',
                    'shipping_zip' => 'required',
                ]
            );

            Address::updateOrCreate(
                ['user_id' => $user->id, 'address_type' => 'shipping'],
                [
                    'phone' => $user_data['phone'],
                    'email' => $user_data['email'],
                    'address' => $request->shipping_address,
                    'city' => $request->shipping_city,
                    'country' => $request->shipping_state,
                    'zip' => $request->shipping_zip,
                ]
            );


            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }

        /**
         * Delete the user's account.
         */

        public function destroy(Request $request): RedirectResponse
        {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }
    }
