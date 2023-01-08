<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
  <nav class="bg-white shadow-md rounded-md">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
      <a href="#" class="text-xl font-bold text-gray-900">User Settings</a>
      <div>
        <a href="home/settings" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Profile</a>
        <a href="<?php echo ROUTE;?>home" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Home</a>
        <a href="home/logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-4">
      <img src="https://assets.stickpng.com/thumbs/585e4beacb11b227491c3399.png" alt="Profile Picture" class="w-12 h-12 rounded-full mr-4">
      <div>
        <h1 class="text-2xl font-bold mb-2 text-black"><?=$data->username?></h1>
        <p class="text-lg font-light text-black"><?=$data->email?></p>
      </div>
    </div>
    <div class="bg-white shadow rounded-md p-4">
      <h2 class="text-xl font-bold mb-2">Profile Settings</h2>
      <form method="post" action="">
                <div class="flex flex-col mb-5">
                    <label for="username" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Change username</label>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <i class="fa-solid fa-user text-blue-500"></i>
                        </div>
                        <input id="username" type="text" name="username" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                        placeholder="<?=$data->username?>"/>
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Change Password:</label>
                <div class="relative">
                    <div class=" inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                    <span>
                        <i class="fas fa-lock text-blue-500"></i>
                    </span>
                    </div>
                    <input
                    id="password"
                    type="password"
                    name="password"
                    class="
                        text-sm
                        placeholder-gray-500
                        pl-10
                        pr-4
                        rounded-2xl
                        border border-gray-400
                        w-full
                        py-2
                        focus:outline-none focus:border-blue-400
                    "
                    placeholder="Enter your current password"
                    />
                </div>
                <div class="relative mt-2">
                    <div class=" inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                    <span>
                        <i class="fas fa-lock text-blue-500"></i>
                    </span>
                    </div>
                    <input
                    id="password"
                    type="password"
                    name="password-new"
                    class="
                        text-sm
                        placeholder-gray-500
                        pl-10
                        pr-4
                        rounded-2xl
                        border border-gray-400
                        w-full
                        py-2
                        focus:outline-none focus:border-blue-400
                    "
                    placeholder="Enter your new password"
                    />
                </div>
                </div>
                <div class="flex flex-col mb-6">
                <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Change E-Mail:</label>
                <div class="relative">
                    <div class=" inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                    <span>
                        <i class="fas fa-at text-blue-500"></i>
                    </span>
                    </div>
                    <input id="email" type="email" name="email" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                    placeholder="<?=$data->email?>"/>
                </div>
                </div>
                <div class="flex w-full">
                <input type="hidden" name="csrfToken" value="<?=$_SESSION["csrf_token"]?>"/>
                <button
                    type="submit"
                    name="user-update-submit"
                    value="user-update-submit"
                    class="
                    flex
                    mt-2
                    items-center
                    justify-center
                    focus:outline-none
                    text-white text-sm
                    sm:text-base
                    bg-blue-500
                    hover:bg-blue-600
                    rounded-2xl
                    py-2
                    w-full
                    transition
                    duration-150
                    ease-in
                    "
                >
                    <span class="mr-2 uppercase">Update</span>
                    <span>
                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    </span>
                </button>
                </div>
            </form>
    </div>
</div>
</body>
</html>