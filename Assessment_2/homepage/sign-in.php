<!-- ### Include PHP code -->
<!-- ### Set session variables -->

<div class="modal-header">
  <h1 class="modal-title fs-5" id="signInModalLabel">Sign In</h1>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

  <form method="post" action="">
    <!-- <img class="mb-4" src="../sources/img/future-fit-image.jpg" alt="" width="150" height="57"> -->
    <!-- <h1 class="h3 mb-3 fw-normal">Sign in</h1> -->

    <div class="form-floating">
      <input type="text" class="form-control" id="username" placeholder="name@example.com" name="username" required>
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="userPassword" placeholder="Password" name="userPassword" required>
      <label for="userPassword">Password</label>
    </div>

    <!-- <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div> -->

    <div class="row my-1 gap-2 py-2 justify-content-center">
      <div class="col-md-3">
        <input class="form-check-input" type="radio" name="userType" id="userType" value="customer" checked>
        <label class="form-check-label" for="userType">Customer</label>
      </div>
      <div class="col-md-3">
        <input class="form-check-input" type="radio" name="userType" id="userType" value="employee">
        <label class="form-check-label" for="userType">Employee</label>
      </div>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit" name="userLogInButton">Sign in</button>

    <hr class="my-4">

    <p class="mt-1 mb-3 pb-1 small">
      <em><a href="" class="text-white float-md-start" data-bs-target="#signUpModal" data-bs-toggle="modal">Don't have an account?</a></em>
      <!-- <em><a href="home.php?sign-up" class="text-white float-md-start" data-bs-target="#signUpModal" data-bs-toggle="modal">Don't have an account?</a></em> -->

    </p>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
  </form>
  
</div>