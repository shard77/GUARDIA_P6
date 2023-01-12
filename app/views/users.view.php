<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Management</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-200">
    <nav class="bg-white border-b border-gray-300 py-4">
      <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="font-bold text-xl">User Management</a>
        <button class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</button>
      </div>
    </nav>
    <div class="container mx-auto py-8">
      <table class="table-auto w-full">
        <thead>
          <tr class="bg-gray-300">
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Creation Date</th>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2"></th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php 
              foreach($data['users'] as $user){
                ?>
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2"><?=$user->username?></td>
                    <td class="border px-4 py-2"><?=$user->email?></td>
                    <td class="border px-4 py-2"><?=$user->creation_date?></td>
                    <td class="border px-4 py-2"><?=$user->id?></td>
                    <td class="border px-4 py-2">
                    </td>
                    <td class="border px-4 py-2">
                      <form action="users/manage/<?=$user->id?>" method="post">
                        <input type="hidden" name="csrfToken" value="<?=$_SESSION["csrf_token"]?>"/>
                        <button type="submit" name="delete-user-submit" value="delete-user-submit" class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        <button type="submit" name="projects-user-submit" value="projects-user-submit" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">See Projects</button>
                        <button type="submit" name="admin-user-submit" value="admin-user-submit" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><?php if($user->admin === 1){ echo "Remove Admin";}else{echo "Add Admin";}?></button>
                      </form>
                    </td>
                </tr>
            <?php
              }
            ?>
        </tbody>
      </table>
    </div>
  </body>
</html>