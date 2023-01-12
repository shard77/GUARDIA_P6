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
          <a href="<?=ROUTE?>home" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Home</a>
          <a href="<?=ROUTE?>home/settings" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Settings</a>
          <?php
          if($_SESSION['user']['admin'] == 1) {
              echo "<a href='".ROUTE."home/admin' class='px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue'>Admin</a>";
          }
          ?>
          <a href="<?=ROUTE?>home/logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
      </div>
    </div>
  </nav>
  <div class="container mx-auto px-4 py-8">
    <div class="text-gray-800 text-xl">
        <h1><?=$data->title?></h1>
    </div>
    <div class="text-gray-600">
        <h2>Created by: <?=$data->creator_name?></h2>
    </div>
    <div class="text-gray-800">
        <p><?=$data->content?></p>
    </div>
    <div class="text-gray-500">
        <?=$data->creation_date?>
    </div>
</div>
</body>
</html>