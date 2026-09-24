<x-layout>

<header class="header"> 

    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-md-6 d-flex justify-content-center ">
             <h1 class="text-center"> Registrati</h1>
       </div>
    </div> 
</div>
</header>

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-12 col-md-6 ">
              
    <form
    class="p-4 shadow rounded-4 bg-secondary"
    action="{{ route('register') }}"
    method="POST"
    > 
    @csrf

    {{-- EMAIL --}}
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- NAME --}}
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- PASSWORD --}}
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">

        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- PASSWORD CONFIRMATION --}}
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Conferma Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary">Registrati</button>
</form>

        </div>
    </div>
</div>

</x-layout>