<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Posts</title>
    <link
      href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-200 font-sans">
    <nav class="bg-white shadow-md rounded-md">
      <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        <a href="#" class="text-xl font-bold text-gray-900">Posts Dashboard</a>
        <div>
        <a href="<?=ROUTE?>home" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Home</a>
        <a href="settings" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Settings</a>
        <a href="logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
        <?php 
            if($_SESSION['user']['admin'] == 1) {
                echo "<a href='admin' class='px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue'>Admin</a>";
            }
        ?>  
      </div>
      </div>
    </nav>
    <div class="container mx-auto px-4">
      <main>
      <h1 class="text-black text-xl font-semibold mt-5">User's Projects:</h1>
      <?php 
        foreach($data as $project){
                ?>
                <div class="py-4">
                  <div class="bg-white rounded shadow-md overflow-hidden">
                  <div class="p-4">
                    <div class="mb-4 flex items-center">
                      <div class="text-xl font-bold text-gray-800">
                        <?=$project->title?>
                      </div>
                     </div>
                    <div class="text-gray-700">
                      <?=$project->content?>
                    </div>
                    <div class="text-gray-400 mt-2">
                      Created: <?=$project->creation_date?>
                    </div>
                    <div class="text-blue-500">
                      <a href="projects/p<?=$project->id?>">Read more</a>
                    </div>
                  </div>  
                </div>
              </div>
            <?php
              }
            ?>
      </main>
    </div>
  </body>
</html>