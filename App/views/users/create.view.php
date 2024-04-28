<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('message');
?>
<!-- Registration Form Box -->
<div class="flex items-center justify-center mt-20">
    <div class="w-full p-8 mx-6 bg-white rounded-lg shadow-md md:w-500">
        <h2 class="mb-4 text-4xl font-bold text-center">Register</h2>
        <!-- <div class="p-3 my-3 bg-red-100 message">This is an error message.</div>
        <div class="p-3 my-3 bg-green-100 message">
          This is a success message.
        </div> -->
        <form method="POST" action="/auth/register">
            <div class="mb-4">
                <input type="text" name="name" placeholder="Full Name"
                    class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $users['name'] ?? '' ?>" />
                <?php if (isset($errors['name'])): ?>
                    <em class="text-red"><?= $errors['name'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email Address"
                    class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $users['email'] ?? '' ?>" />
                <?php if (isset($errors['email'])): ?>
                    <em class="text-red"><?= $errors['email'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="text" name="city" placeholder="City"
                    class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $users['city'] ?? '' ?>" />
            </div>
            <div class="mb-4">
                <input type="text" name="state" placeholder="State"
                    class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $users['state'] ?? '' ?>" />

            </div>
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-2 border rounded focus:outline-none" />
                <?php if (isset($errors['password'])): ?>
                    <em class="text-red-500"><?= $errors['password'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                    class="w-full px-4 py-2 border rounded focus:outline-none" />
                <?php if (isset($errors['password_confirmation'])): ?>
                    <em class="text-red-500"><?= $errors['password_confirmation'] ?></em>
                <?php endif; ?>
            </div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none">
                Register
            </button>

            <p class="mt-4 text-gray-500">
                Already have an account?
                <a class="text-blue-900" href="/auth/login">Login</a>
            </p>
        </form>
    </div>
</div>

<?php
loadPartial('footer');
?>