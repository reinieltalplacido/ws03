<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('showcase-search'); ?>
<?php loadPartial('top-banner'); ?>


 <section class="container mx-auto p-4 mt-4">
      <div class="rounded-lg shadow-md bg-white p-3">
       <div class="flex justify-between items-center">
      <a class="block p-4 text-[#581C87] hover:text-[#2E1065] transition-colors" href="/listings">
        <i class="fa fa-arrow-left mr-2"></i>
        Back To Listings
      </a>
      <div class="flex items-center space-x-3 ml-4">
        <a href="/listings/edit/<?= $listing->id?>" class="px-5 py-2 bg-[#581C87] hover:bg-[#2E1065] text-white rounded-lg transition-all duration-300 shadow-sm">Edit</a>
        <!-- Delete Form -->
        <form method="POST" class="m-0">
          <input type = "hidden" name = "_method" value = "DELETE">
          <button type="submit" class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all duration-300 shadow-sm">Delete</button>
        </form>
        <!-- End Delete Form -->
      </div>
    </div>
        <div class="p-4">
          <h2 class="text-xl font-semibold"><?= $listing->title ?></h2>
          <p class="text-gray-700 text-lg mt-2">
            <?= $listing->description ?>    
          </p>
          <ul class="my-4 bg-gray-100 p-4">
            <li class="mb-2"><strong>Salary:</strong> <?= formatSalary($listing->salary) ?></li>
            <li class="mb-2">
              <strong>Location:</strong> <?= $listing->city ?> <?= $listing->state ?>
              <span
                class="text-xs bg-[#F5F3FF] text-[#2E1065] font-semibold rounded-full px-3 py-1 ml-2 border border-[#2E1065]/10"
                >Local</span
              >
            </li>
            <?php if (!empty($listing->tags)) : ?>
            <li class="mb-2">
              <strong>Tags:</strong> <?= $listing->tags  ?>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </section>

    <section class="container mx-auto p-4">
      <h2 class="text-xl font-semibold mb-4">Job Details</h2>
      <div class="rounded-lg shadow-md bg-white p-4">
        <h3 class="text-lg font-semibold mb-2 text-[#2E1065]">
          Job Requirements
        </h3>
        <p>
          <?= $listing->requirements ?>
        </p>
        <h3 class="text-lg font-semibold mt-4 mb-2 text-[#2E1065]">Benefits</h3>
        <p><?= $listing->benefits ?></p>
      </div>
      <p class="my-5">
        Put "Job Application" as the subject of your email and attach your
        resume.
      </p>
      <a
        href="mailto:<?= $listing->email ?>"
        class="block w-full text-center px-8 py-3 shadow-lg rounded-lg border border-[#581C87]/20 text-white bg-[#2E1065] hover:bg-[#581C87] transition-all duration-300 font-semibold"
      >
        Apply Now
      </a>
    </section>

      
<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>