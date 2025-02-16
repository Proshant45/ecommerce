<x-frontend.layout>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Profile Section -->
                <div class="mb-5">
                    <h2 class="h5 fw-semibold text-center">{{$user->name}}</h2>
                    <p class="text-muted small">This information will be displayed publicly so be careful what you
                        share.</p>

                    <div class="border-top mt-4">
                        <div class="row py-3 border-bottom">
                            <div class="col-sm-4">
                                <label class="fw-medium">Full name:</label>
                            </div>
                            <div class="col-sm-8 d-flex justify-content-between align-items-center">
                                {{$user->name}}
                            </div>
                        </div>
                        <div class="row py-3 border-bottom">
                            <div class="col-sm-4">
                                <label class="fw-medium">Email address:</label>
                            </div>
                            <div class="col-sm-8 d-flex justify-content-between ">
                                <span>{{$user->email}}</span>

                            </div>
                        </div>
                        <div class="row py-3 border-bottom">
                            <div class="col-sm-4">
                                <label class="fw-medium">Phone Number:</label>
                            </div>
                            <div class="col-sm-8 d-flex justify-content-between ">
                                <span>{{$user->phone}}</span>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Address-->
                <div class="mb-5">
                    <h2 class="h5 fw-semibold">Address</h2>
                    <p class="text-muted small">Connect bank accounts to your account.</p>

                    <div class="border-top mt-4">
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <span class="fw-medium">TD Canada Trust</span>
                           
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <span class="fw-medium">Royal Bank of Canada</span>

                        </div>
                        <div class="pt-3">

                        </div>
                    </div>
                </div>

                <!-- Integrations Section -->
                <div class="mb-5">
                    <h2 class="h5 fw-semibold">Integrations</h2>
                    <p class="text-muted small">Connect applications to your account.</p>

                    <div class="border-top mt-4">
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <span class="fw-medium">QuickBooks</span>

                        </div>
                        <div class="pt-3">
                            <button class="btn btn-link text-primary p-0">
                                <i class="fa fa-plus"></i> Add another application
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-frontend.layout>