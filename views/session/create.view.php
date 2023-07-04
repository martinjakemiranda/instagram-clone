<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm flex w-full justify-center">
            <img src="https://gamingstreet.com/wp-content/uploads/2019/10/Instagram_logo_wordmark_logotype-565x318.png" style="width: 174px">
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-2" action="/session" method="POST">
            <div>
                <div class="mt-0">
                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Username or email">
                </div>

                <?php if (isset($errors['email'])) : ?>
                  <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
                <?php endif; ?>

            </div>

            <div>
                <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Password">

                <?php if (isset($errors['password'])) : ?>
                  <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
                <?php endif; ?>

            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Login</button>
            </div>

            <div class="px-20">
                Dont have an account? <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Sign Up</a>
            </div>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>