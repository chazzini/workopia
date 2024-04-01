<?php 
    loadPartial('head');
    loadPartial('navbar') ;
    loadPartial('top-banner');
?>
   
    <!-- Job Listings -->
    <section>
      <div class="container p-4 mx-auto mt-4">
        <div class="p-3 mb-4 text-3xl font-bold text-center border border-gray-300">All Jobs</div>
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-3">
          <!-- Job Listing 1: Software Engineer -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Software Engineer</h2>
              <p class="mt-2 text-lg text-gray-700">
                We are seeking a skilled software engineer to develop
                high-quality software solutions.
              </p>
              <ul class="p-4 my-4 bg-gray-100 rounded">
                <li class="mb-2"><strong>Salary:</strong> $80,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> New York
                  <span
                    class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full"
                    >Local</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Development</span>,
                  <span>Coding</span>
                </li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>

          <!-- Job Listing 2: Marketing Specialist -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Marketing Specialist</h2>
              <p class="mt-2 text-lg text-gray-700">
                We are looking for a Marketing Specialist to create and manage
                marketing campaigns.
              </p>
              <ul class="p-4 my-4 bg-gray-100 rounded">
                <li class="mb-2"><strong>Salary:</strong> $70,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> San Francisco
                  <span
                    class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full"
                    >Remote</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Marketing</span>,
                  <span>Advertising</span>
                </li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>

          <!-- Job Listing 3: Web Developer -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Web Developer</h2>
              <p class="mt-2 text-lg text-gray-700">
                Join our team as a Web Developer and create amazing web
                applications.
              </p>
              <ul class="p-4 my-4 bg-gray-100 rounded">
                <li class="mb-2"><strong>Salary:</strong> $75,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> Los Angeles
                  <span
                    class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full"
                    >Local</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Web Development</span>,
                  <span>Programming</span>
                </li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>

          <!-- Job Listing 4: Data Analyst -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Data Analyst</h2>
              <p class="mt-2 text-lg text-gray-700">
                We are hiring a Data Analyst to analyze and interpret data for
                insights.
              </p>
              <ul class="p-4 my-4 bg-gray-100 rounded">
                <li class="mb-2"><strong>Salary:</strong> $65,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> Chicago
                  <span
                    class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full"
                    >Remote</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Data Analysis</span>,
                  <span>Statistics</span>
                </li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>

          <!-- Job Listing 5: Graphic Designer -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Graphic Designer</h2>
              <p class="mt-2 text-lg text-gray-700">
                Join our creative team as a Graphic Designer and bring ideas to
                life.
              </p>
              <ul class="p-4 my-4 bg-gray-100 rounded">
                <li class="mb-2"><strong>Salary:</strong> $60,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> Miami
                  <span
                    class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full"
                    >Local</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Graphic Design</span>,
                  <span>Creative</span>
                </li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>

          <!-- Job Listing 6: Data Scientist -->
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-4">
              <h2 class="text-xl font-semibold">Data Scientist</h2>
              <p class="mt-2 text-lg text-gray-700">
                We're looking for a Data Scientist to analyze complex data and
                generate insights.
              </p>
              <ul class="p-4 my-4 bg-gray-100 rounded">
                <li class="mb-2"><strong>Salary:</strong> $90,000</li>
                <li class="mb-2">
                  <strong>Location:</strong> Seattle
                  <span
                    class="px-2 py-1 ml-2 text-xs text-white bg-blue-500 rounded-full"
                    >Remote</span
                  >
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span>Data Science</span>,
                  <span>Machine Learning</span>
                </li>
              </ul>
              <a href="details.html"
              class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
            >
              Details
            </a>
            </div>
          </div>
        </div>
      </section>


      <?= loadPartial('footer');?>