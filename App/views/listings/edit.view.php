<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('top-banner');
loadPartial('message');
?>

<!-- Post a Job Form Box -->
<section class="flex items-center justify-center mt-20">
    <div class="w-full p-8 mx-6 bg-white rounded-lg shadow-md md:w-600">
        <h2 class="mb-4 text-4xl font-bold text-center">Edit Job Listing</h2>
        <!-- <div class="p-3 my-3 bg-red-100 message">This is an error message.</div>
        <div class="p-3 my-3 bg-green-100 message">
          This is a success message.
        </div> -->
        <form method="POST" action="/listings/update/<?= $listings['id'] ?>">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-500">
                Job Info
            </h2>
            <input hidden name="_method" value="PUT" />
            <div class="mb-4">
                <input type="text" name="title" placeholder="Job Title"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['title'] ?? '' ?>" />
                <?php if (isset($errors['title'])): ?>
                    <em class="text-danger"><?= $errors['title'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <textarea name="description" placeholder="Job Description"
                    class="w-full px-4 py-2 border rounded focus:outline-none"><?= $listings['title'] ?? '' ?></textarea>
            </div>
            <?php if (isset($errors['description'])): ?>
                <em class="text-danger"><?= $errors['description'] ?></em>
            <?php endif; ?>
            <div class="mb-4">
                <input type="text" name="salary" placeholder="Annual Salary"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['salary'] ?? '' ?>" />

            </div>
            <div class="mb-4">
                <input type="text" name="requirements" placeholder="Requirements"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['requirements'] ?? '' ?>" />
                <?php if (isset($errors['requirements'])): ?>
                    <em class="text-danger"><?= $errors['requirements'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="text" name="benefits" placeholder="Benefits"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['benefits'] ?? '' ?>" />
            </div>
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-500">
                Company Info & Location
            </h2>
            <div class="mb-4">
                <input type="text" name="company" placeholder="Company Name"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['company'] ?? '' ?>" />
                <?php if (isset($errors['company'])): ?>
                    <em class="text-danger"><?= $errors['company'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="text" name="address" placeholder="Address"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['address'] ?? '' ?>" />
            </div>
            <div class="mb-4">
                <input type="text" name="city" placeholder="City"
                    class="w-full px-4 py-2 border rounded focus:outline-none" value="<?= $listings['city'] ?? '' ?>" />
                <?php if (isset($errors['city'])): ?>
                    <em class="text-danger"><?= $errors['city'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="text" name="state" placeholder="State"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['state'] ?? '' ?>" />
                <?php if (isset($errors['state'])): ?>
                    <em class="text-danger"><?= $errors['state'] ?></em>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="text" name="phone" placeholder="Phone"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['phone'] ?? '' ?>" />
            </div>
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email Address For Applications"
                    class="w-full px-4 py-2 border rounded focus:outline-none"
                    value="<?= $listings['email'] ?? '' ?>" />
            </div>
            <button class="w-full px-4 py-2 my-3 text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none">
                Save
            </button>
            <a href="/"
                class="block w-full px-4 py-2 text-center text-white bg-red-500 rounded hover:bg-red-600 focus:outline-none">
                Cancel
            </a>
        </form>
    </div>
</section>

<!-- Bottom Banner -->
<section class="container mx-auto my-6">
    <div class="flex items-center justify-between p-4 text-white bg-blue-800 rounded">
        <div>
            <h2 class="text-xl font-semibold">Looking to hire?</h2>
            <p class="mt-2 text-lg text-gray-200">
                Post your job listing now and find the perfect candidate.
            </p>
        </div>
        <a href="listings/create"
            class="px-4 py-2 text-black transition duration-300 bg-yellow-500 rounded hover:bg-yellow-600 hover:shadow-md">
            <i class="fa fa-edit"></i> Post a Job
        </a>
    </div>
</section>


<?= loadPartial('footer'); ?>