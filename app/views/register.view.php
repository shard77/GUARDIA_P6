<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/global.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900">
    <main>
        <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="
            flex flex-col
            bg-white
            shadow-md
            px-4
            sm:px-6
            md:px-8
            lg:px-10
            py-8
            rounded-3xl
            w-50
            max-w-md
            ">
            <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
            Welcome
            </div>
            <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
            Enter your credentials to create your account
            </div>

            <div class="mt-10">
            <form method="post" action="">
            <div class="flex flex-col mb-5">
                    <label for="username" class="mb-1 text-xs tracking-wide text-gray-600">Username:</label>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <i class="fa-solid fa-user text-blue-500"></i>
                        </div>
                        <input id="username" type="text" name="username" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                        placeholder="Enter your username"/>
                    </div>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="email" class="mb-1 text-xs tracking-wide text-gray-600">E-Mail Address:</label>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <i class="fas fa-at text-blue-500"></i>
                        </div>
                        <input id="email" type="email" name="email" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                        placeholder="Enter your email"/>
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
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
                    placeholder="Enter your password"
                    />
                </div>
                </div>
                <div class="flex flex-col mb-6">
                <label for="password-validate" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Re-Enter Password:</label>
                <div class="relative">
                    <div class=" inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                    <span>
                        <i class="fas fa-lock text-blue-500"></i>
                    </span>
                    </div>
                    <input
                    id="password-validate"
                    type="password"
                    name="password-validate"
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
                    placeholder="Enter your password again"
                    />
                </div>
                </div>

                <div class="flex w-full">
                <button
                    type="submit"
                    name="register-submit"
                    value="register-submit"
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
                    ease-in"
                >
                    <span class="mr-2 uppercase">Register</span>
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
        <div class="flex justify-center items-center mt-6">
            <a
            href="<?php echo ROUTE;?>login"
            class="
                inline-flex
                items-center
                text-gray-700
                font-medium
                text-xs text-center
            "
            >
            <span class="ml-2"
                >Already have an account?
                <a
                href="<?php echo ROUTE;?>login"
                class="text-xs ml-2 text-blue-500 font-semibold"
                >Login now</a
                ></span
            >
            </a>
        </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/85b199d966.js" crossorigin="anonymous"></script>
</body>
</html>