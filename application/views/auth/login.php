<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign In</title>
  <link href="/css/style.css" rel="stylesheet" />
   <!-- Favicons -->
  <?php if (!empty($logo->image)): ?>
    <link rel="icon" type="image/png" href="<?= base_url($logo->image) ?>">
<?php else: ?>
    <!-- Fallback jika logo tidak ada -->
    <link rel="icon" href="<?= base_url('favicon.png') ?>">
<?php endif; ?>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <!-- SweetAlert 2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    
        * {
        cursor: pointer; /* cursor berubah jadi tangan */
        }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-12 sm:px-6 lg:px-8">

  <div class="max-w-md space-y-8">
    <div>
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        <img src="<?= base_url('temp_login/img/logo.png') ?>" alt="CoolAdmin">
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Or
        <a href="<?= base_url('auth/register')?>" class="font-medium text-blue-600 hover:text-blue-500">Daftar serikat</a>
      </p>
    </div>

    <div class="bg-white py-8 px-6 shadow sm:rounded-lg sm:px-10">
      <form class="space-y-6" action="<?= base_url('auth') ?>" method="post">
        <div>
          <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
          <input id="username" name="username" type="text" required autocomplete="username"
                 placeholder="Enter your username"
                 class="mt-1 appearance-none rounded-md w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <div class="relative mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" name="password" type="password" required autocomplete="current-password"
                placeholder="Confirm your password"
                class="mt-1 appearance-none rounded-md w-full px-3 py-2 pr-10 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <button type="button" onclick="togglePassword('password', this)" class="text-gray-500 hover:text-gray-700 focus:outline-none">
            👁️
            </button>
        </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember_me" name="remember_me" type="checkbox"
                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
            <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
          </div>

          <div class="text-sm">
            <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Forgot your password?</a>
          </div>
        </div>

        <div>
          <button type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white"
            style="background-color: #0097b4; hover:bg-[#007f9e]; focus:ring-[#0097b4]">
            Sign in
          </button>

        </div>
      </form>

      <div class="mt-6">
        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">Or continue with</span>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-3 gap-3">
          <a href="#" class="flex justify-center items-center border border-gray-300 rounded-md shadow-sm bg-white px-4 py-2 hover:bg-gray-50">
            <img class="h-5 w-5" src="https://www.svgrepo.com/show/512120/facebook-176.svg" alt="Facebook" />
          </a>
          <a href="#" class="flex justify-center items-center border border-gray-300 rounded-md shadow-sm bg-white px-4 py-2 hover:bg-gray-50">
            <img class="h-5 w-5" src="https://www.svgrepo.com/show/513008/twitter-154.svg" alt="Twitter" />
          </a>
          <a href="#" class="flex justify-center items-center border border-gray-300 rounded-md shadow-sm bg-white px-4 py-2 hover:bg-gray-50">
            <img class="h-6 w-6" src="https://www.svgrepo.com/show/506498/google.svg" alt="Google" />
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- SweetAlert Script to show messages -->
  <script>
    <?php if ($this->session->flashdata('success')): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: <?= json_encode($this->session->flashdata('success')) ?>,
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        position: 'top-end',
        toast: true
      });
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: <?= json_encode($this->session->flashdata('error')) ?>,
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        position: 'top-end',
        toast: true
      });
    <?php endif; ?>
  </script>
<script>
  // Toggle show/hide password
  function togglePassword(id, el) {
    const input = document.getElementById(id);
    if (input.type === "password") {
      input.type = "text";
      el.textContent = "🙈"; // hide icon
    } else {
      input.type = "password";
      el.textContent = "👁️"; // show icon
    }
  }

</script>
</body>
</html>
