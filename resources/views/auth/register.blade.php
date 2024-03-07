<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
{{--  <h3>Register Form</h3>--}}
<div class="grid h-screen place-items-center">
  <div class="w-full max-w-xs ">
      <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('register.check') }}" method="POST">

          @csrf

          <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                  First Name
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="first_name" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}">
              @error('first_name')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
          </div>

          <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                  Last Name
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="last_name" name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}">
              @error('last_name')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
          </div>

          <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                  Email
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
              @error('email')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
          </div>

          <div class="mb-6">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Password
              </label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="******************">
              @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
          </div>
          <div class="flex items-center justify-between">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                  Register
              </button>
          </div>
      </form>
      <p class="text-center text-gray-500 text-xs">
          &copy;2020 Acme Corp. All rights reserved.
      </p>
  </div>
</div>
</body>
