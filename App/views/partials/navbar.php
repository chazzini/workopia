<!-- Nav -->
<header class="p-4 text-white bg-blue-900">
    <div class="container flex items-center justify-between mx-auto">
        <h1 class="text-3xl font-semibold">
            <a href="/">Workopia</a>
        </h1>
        <nav class="space-x-4">
            <?php

      use Framework\Session;

      if (!Session::has('user')): ?>
            <a href="/auth/login" class="text-white hover:underline">Login</a>
            <a href="/auth/register" class=" text-white hover:underline">Register</a>
            <?php else: ?>
            <div class="flex align-middle">
                <span class="text-white  px-4">Welcome <?= Session::get('user')['name'] ?></span>
                <a href="/logout" class="text-white hover:underline px-4">Logout</a>
                <a href="/listings/create"
                    class="px-4 py-2 text-black transition duration-300 bg-yellow-500 rounded hover:bg-yellow-600 hover:shadow-md"><i
                        class="fa fa-edit"></i> Post a Job</a>
            </div>
            <?php endif; ?>
        </nav>
    </div>
</header>