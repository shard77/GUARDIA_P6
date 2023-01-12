<!DOCTYPE html>
<html>
  <head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Contact Form</title>
  </head>
  <body class="bg-gray-200">
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-medium mb-4">Contact Us</h1>
      <form class="bg-white p-6 rounded-lg shadow-md" action="" method="post">
        <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2">Subject</label>
        <input type="hidden" name="csrfToken" value="<?=$_SESSION["csrf_token"]?>"/>
          <input
            class="w-full border border-gray-400 p-2 rounded-lg"
            type="text"
            name="subject"
            placeholder="Subject"
            required
          >
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2">Message</label>
          <textarea
            class="w-full border border-gray-400 p-2 rounded-lg h-32"
            name="message"
            placeholder="Your message"
            required
          ></textarea>
        </div>
        <button type="submit" name="contact-submit" value="contact-submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
          Send
        </button>
      </form>
    </div>
  </body>
</html>