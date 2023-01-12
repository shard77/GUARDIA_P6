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
        <a href="home/projects" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Projects</a>
        <a href="home/settings" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Settings</a>
        <?php 
            if($_SESSION['user']['admin'] == 1) {
                echo "<a href='home/admin' class='px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue'>Admin</a>";
            }
        ?>
        <a href="home/logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto px-4 py-8">
    <div class="flex items-center mb-4">
      <img src="<?=$data[0]->user_avatar?>" alt="Profile Picture" class="w-12 h-12 rounded-full mr-4">
      <div>
        <h1 class="text-2xl font-bold mb-2 text-black">Welcome, <?=$data['username']?></h1>
        <p class="text-lg font-light text-black"><?=$data['email']?></p>
      </div>
    </div>
    <div class="mb-2">
		<?=$data[0]->homepage_text?>
    </div>
    <div class="bg-white shadow rounded-md p-4">
      <h2 class="text-xl font-bold mb-2">Recent Activity</h2>
      <ul>
        <li class="mb-2">Lorem ipsum dolor sit amet</li>
        <li class="mb-2">Consectetur adipiscing elit</li>
        <li class="mb-2">Proin dignissim mi at diam elementum</li>
      </ul>
    </div>  
    <button type="button" onclick="window.location.href='home/create'" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Project</button>
    <button type="button" onclick="window.location.href='home/contact'" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Contact Staff</button>
</div>
</body>
</html>