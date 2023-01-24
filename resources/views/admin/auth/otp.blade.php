<x-layouts.auth>
    <x-slot:title>
        Admin OTP
    </x-slot:title>
    {{-- Content --}}
    <div class="card overflow-hidden">
        <div class="bg-primary">
            <div class="text-primary text-center p-4">
                <h5 class="text-white font-size-20">Selamat datang kembali !</h5>
                <p class="text-white-50">SIM Sekolah.</p>
                <a href="index.html" class="logo logo-admin">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" height="24" alt="logo">
                </a>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="p-3">
                @if($errors->has('email'))
                    <div class="py-3">
                        <x-ui.alert type="danger" message="{{ $errors->first('email') }}" />
                    </div>
                @endif
                <form class="mt-4" action="{{ route('admin.otp.verify') }}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="otp">OTP</label>
                        <input type="text" class="form-control" name="otp" id="otp" placeholder="OTP">
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</x-layouts.auth>
