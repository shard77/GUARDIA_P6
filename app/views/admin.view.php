<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
  <nav class="bg-white shadow-md rounded-md">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
      <a href="#" class="text-xl font-bold text-gray-900">Admin Dashboard</a>
      <div>
        <a href="projects" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Projects</a>
        <a href="<?=ROUTE?>home" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Home</a>
        <a href="settings" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Settings</a>
        <a href="logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto px-4 py-8">
  <div class="flex items-center mb-4">
      <img src="https://assets.stickpng.com/thumbs/585e4beacb11b227491c3399.png" alt="Profile Picture" class="w-12 h-12 rounded-full mr-4">
      <div>
        <h1 class="text-2xl font-bold mb-2 text-black"><?=$data['username']?></h1>
        <p class="text-lg font-light text-black"><?=$data['email']?></p>
      </div>
    </div>
    <div class="bg-white shadow rounded-md p-4">
    <form method="post" action="" enctype="multipart/form-data">
                <div class="flex flex-col mb-5">
                    <label for="homepagetext" class="block text-gray-700 font-medium mb-2">Change homepage text:</label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="content" name="homepagetext" rows="10" placeholder="Write your homepage text here"><?=$data[0]->homepage_text?></textarea>
                </div>
                <div class="flex flex-col mb-6">
                <label class="block text-gray-700 font-medium mb-2" for="avatar">Change avatar image</label>
                <input class="mb-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-96 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="file" id="avatar" name="avatar">
                <input type="hidden" name="csrfToken" value="<?=$_SESSION["csrf_token"]?>"/>
                <button
                    type="submit"
                    name="site-update-submit"
                    value="site-update-submit"
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
                    w-40
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
    <button type="button" onclick="window.location.href='users'" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Manage Users</button>
  </div>
</body>
</html>