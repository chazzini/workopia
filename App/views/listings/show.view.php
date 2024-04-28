<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('top-banner');
loadPartial('message');
?>

<section class="container p-4 mx-auto mt-4">
    <div class="p-3 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <a class="block p-4 text-blue-700" href="/listings">
                <i class="fa fa-arrow-alt-circle-left"></i>
                Back To Listings
            </a>
            <?php if (\Framework\Authorization::isOwner($listing->user_id)): ?>
                <div class="flex ml-4 space-x-4">
                    <a href="/listings/edit/<?= $listing->id ?>"
                        class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>
                    <!-- Delete Form -->
                    <form method="POST" action="/listings/<?= $listing->id ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                    </form>
                    <!-- End Delete Form -->
                </div>
            <?php endif; ?>
        </div>
        <div class="p-4">
            <h2 class="text-xl font-semibold">
                <?= $listing->title ?>
            </h2>
            <p class="mt-2 text-lg text-gray-700">
                <?= $listing->description ?>
            </p>
            <ul class="p-4 my-4 bg-gray-100">
                <li class="mb-2"><strong>Salary:</strong>
                    <?= formatSalary($listing->salary) ?>
                </li>
                <li class="mb-2">
                    <strong>Location:</strong>
                    <?= $listing->city ?>
                    <!-- <span class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full">Local</span> -->
                </li>
                <li class="mb-2">
                    <strong>Tags:</strong> <span>
                        <?= $listing->tags ?>
                    </span>,

                </li>
            </ul>
        </div>
    </div>
</section>

<section class="container p-4 mx-auto">
    <h2 class="mb-4 text-xl font-semibold">Job Details</h2>
    <div class="p-4 bg-white rounded-lg shadow-md">
        <h3 class="mb-2 text-lg font-semibold text-blue-500">
            Job Requirements
        </h3>
        <p>
            <?= $listing->requirements ?>
        </p>
        <h3 class="mt-4 mb-2 text-lg font-semibold text-blue-500">Benefits</h3>
        <p>
            <?= $listing->benefits ?>
        </p>
    </div>
    <p class="my-5">
        Put "Job Application" as the subject of your email and attach your
        resume.
    </p>
    <a href="<?= $listing->email ?>"
        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
        Apply Now
    </a>
</section>

<!-- Bottom Banner -->
<?= loadPartial('footer'); ?>