<!DOCTYPE html>
<html>
  <head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Post</title>
  </head>
  <body class="bg-gray-200">
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-medium mb-4">Edit Post</h1>
      <form class="bg-white p-6 rounded-lg shadow-md" method="post" action="">
        <div class="mb-4">
        <input type="hidden" name="csrfToken" value="<?=$_SESSION["csrf_token"]?>"/>
          <label class="block text-gray-700 font-medium mb-2">Title</label>
          <input
            class="w-full border border-gray-400 p-2 rounded-lg"
            type="text"
            name="project-title"
            placeholder="Project Title"
            value="<?=$data->title?>"
          >
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">Project content</label>
          <textarea
            class="w-full border border-gray-400 p-2 rounded-lg h-32"
            placeholder="Project body" name="project-content"
          ><?=$data->content?></textarea>
        </div>
        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600" name="submit-post" value="submit-post">
          Save
        </button>
      </form>
    </div>
  </body>
</html>