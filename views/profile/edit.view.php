<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <form class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8" method="POST" action="/profile" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
        <div class="mt-5 flex flex-col">
            <label for="email" class="font-bold text-lg">Name: <?= $_SESSION['user']['fullname']?></label>
        </div>

        <div class="mt-5 flex flex-col">
            <label for="email" class="font-bold text-lg">Username: <?= $_SESSION['user']['username']?></label>
        </div>

        <div class="mt-5 flex flex-col">
            <label for="email" class="font-bold text-lg">Email Address: <?= $_SESSION['user']['email']?></label>
        </div>

        <div class="mt-5 flex flex-col">
            <label for="password" class="font-bold text-lg">Change password</label>
        </div>

        <div class="mt-5 flex flex-col">
            <label for="avatar" class="font-bold text-lg">Select Image</label>
            <input type="file" accept="image/*" name="avatar" id="avatar"/>
        </div>

        <div class="mt-3">
            <button type="submit" 
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >Submit
            </button>

            <a 
            href="/" 
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >Cancel
            </a>
        </div>
    </form>
</main>

<?php require base_path('views/partials/footer.php') ?>