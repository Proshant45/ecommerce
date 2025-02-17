<x-frontend.layout>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Profile Section -->
                <div class="mb-5">
                    <h2 class="h5 fw-semibold text-center">{{auth()->user()->name}}</h2>
                    <p class="text-muted medium text-center "> Your information is confidential
                    </p>
                </div>
                <x-frontend.profile_info>

                </x-frontend.profile_info>
            </div>
        </div>
    </main>
</x-frontend.layout>