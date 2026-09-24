<x-layout>

<header class="header"> 
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-md-6 d-flex justify-content-center ">
             <h1 class="text-center text-dark fw-bold"> Accedi</h1>
          </div>
        </div> 
    </div>
</header>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-12 col-md-6">
              
            @if(session('message'))
                <div class="alert alert-success border-0 shadow-sm text-center mb-4 py-3">
                    <i class="bi bi-check-circle-fill text-success me-2"></i> {{ session('message') }}
                </div>
            @endif

            <form class="p-4 shadow rounded-4 bg-white" action="{{ route('login') }}" method="POST"> 
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-2">Accedi</button>
            </form>

        </div>
    </div>
</div>

</x-layout>
