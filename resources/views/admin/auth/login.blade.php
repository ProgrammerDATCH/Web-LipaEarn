<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('partials._header')
    <title>@yield('title','Admin Login')</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-center h-px-500">
            <form class="w-px-400 border rounded p-3 p-md-5">
              <h3 class="mb-4">Sign In</h3>
      
              <div class="mb-3">
                <label class="form-label" for="form-alignment-username">Username</label>
                <input type="text" id="form-alignment-username" class="form-control" placeholder="john.doe">
              </div>
      
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="form-alignment-password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="form-alignment-password" class="form-control" placeholder="············" aria-describedby="form-alignment-password2">
                  <span class="input-group-text cursor-pointer" id="form-alignment-password2"><i class="bx bx-show"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input">
                  <span class="form-check-label">Remember me</span>
                </label>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
          @include('partials._footer')
          
        </div>
      </div>
     
      @include('partials._scripts')
      @include('partials._auth-scripts')
</body>
</html>