<!-- __DIR__ brings you to curretn files directory, . concatenated with
 /../partials   bring you to views directory then partials is accessible 
-->
<?php require(__DIR__ . '/../partials/head.php') ?>

<!-- or simply you can specify the directory -->
<?php require('views/partials/nav.php') ?>

<?php require('views/partials/banner.php') ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
            <?= htmlspecialchars($note['body']) ?> <!--IMPORTANT -->
            <p class="mt-6">
                <a href="/notes" class="text-blue-500 underline">Go Back...</a>
            </p>
        </div>
    </main>

<?php require('views/partials/footer.php') ?>
