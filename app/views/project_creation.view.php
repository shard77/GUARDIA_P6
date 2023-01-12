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
        <a href="#" class="text-xl font-bold text-gray-900">Project Creation</a>
        <div>
          <a href="<?=ROUTE?>home" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-800">Home</a>
          <a href="settings" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Settings</a>
          <?php 
            if($_SESSION['user']['admin'] == 1) {
                echo "<a href='admin' class='px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue'>Admin</a>";
            }
          ?>
          <a href="logout" class="px-4 py-2 font-bold text-gray-900 rounded-full hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue">Logout</a>
        </div>
      </div>
    </nav>
    <form class="w-full max-w-md mx-auto my-8 p-8 bg-white rounded shadow-lg" method="post" action="">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                Title
            </label>
            <input type="hidden" name="csrfToken" value="<?=$_SESSION["csrf_token"]?>"/>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" name="project-creation-title" type="text" placeholder="Post Title">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">         
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">
                Content
            </label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="content" name="project-creation-content" rows="10" placeholder="Write your post here"></textarea>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full px-3">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="project-creation-submit" value="project-creation-submit">
                Publish Project
            </button>
            </div>
        </div>
    </form>
  </body>
</html>