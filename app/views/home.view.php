<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
  <nav class="bg-white shadow-md rounded-md">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
      <a href="#" class="text-xl font-bold text-gray-900">User Dashboard</a>
      <div>
        <a href="#" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Profile</a>
        <a href="#" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Settings</a>
        <a href="home/logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
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
      <h2 class="text-xl font-bold mb-2">Recent Activity</h2>
      <ul>
        <li class="mb-2">Lorem ipsum dolor sit amet</li>
        <li class="mb-2">Consectetur adipiscing elit</li>
        <li class="mb-2">Proin dignissim mi at diam elementum</li>
      </ul>
    </div>
    <h1 class="text-black text-xl font-semibold mt-5">Recent Posts:</h1>
    <div class="max-w-3xl flex items-left mt-3">
  <div class="flex flex-col">
    <div class="bg-white rounded-lg shadow-lg p-4 mb-4">
      <div class="flex items-center justify-between pb-4">
        <div class="text-lg font-bold text-gray-800">
          User Name
        </div>
        <div class="text-gray-600">
          Date and Time
        </div>
      </div>
      <div class="text-gray-700 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum
        lacus eu mauris fermentum, eu tincidunt lacus efficitur.
      </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-4 mb-4">
      <div class="flex items-center justify-between pb-4">
        <div class="text-lg font-bold text-gray-800">
          User Name
        </div>
        <div class="text-gray-600">
          Date and Time
        </div>
      </div>
      <div class="text-gray-700 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum
        lacus eu mauris fermentum, eu tincidunt lacus efficitur.
      </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-4 mb-4">
      <div class="flex items-center justify-between pb-4">
        <div class="text-lg font-bold text-gray-800">
          User Name
        </div>
        <div class="text-gray-600">
          Date and Time
        </div>
      </div>
      <div class="text-gray-700 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum
        lacus eu mauris fermentum, eu tincidunt lacus efficitur.
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>