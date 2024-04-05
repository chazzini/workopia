<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('showcase-search');
loadPartial('top-banner');

?>





<!-- Job Listings -->
<section>
    <div class="container p-4 mx-auto mt-4">
        <div class="p-3 mb-4 text-3xl font-bold text-center border border-gray-300">Recent Jobs</div>
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
            <?php foreach ($listings as $listing): ?>
                <!-- Job Listing 1: Software Engineer -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">
                            <?= $listing->title ?>
                        </h2>
                        <p class="mt-2 text-lg text-gray-700">
                            <?= $listing->description ?>
                        </p>
                        <ul class="p-4 my-4 bg-gray-100 rounded">
                            <li class="mb-2"><strong>Salary:</strong>
                                <?= formatSalary($listing->salary) ?>
                            </li>
                            <li class="mb-2">
                                <strong>Location:</strong>
                                <?= $listing->city ?>
                                <!-- <span class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full">Local</span> -->
                            </li>
                            <li class="mb-2">
                                <strong>Tags:</strong>

                                <span>
                                    <?= $listing->tags ?>
                                </span>
                            </li>
                        </ul>
                        <a href="/listings/<?= $listing->id ?>"
                            class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            Details
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>




        </div>
        <a href="/listings" class="block text-xl text-center">
            <i class="fa fa-arrow-alt-circle-right"></i>
            Show All Jobs
        </a>
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
        <a href="/listings/create"
            class="px-4 py-2 text-black transition duration-300 bg-yellow-500 rounded hover:bg-yellow-600 hover:shadow-md">
            <i class="fa fa-edit"></i> Post a Job
        </a>
    </div>
</section>
<?php loadPartial('footer'); ?>