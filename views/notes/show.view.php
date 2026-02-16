
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>




    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
            <?= htmlspecialchars($note['body']) ?> <!--IMPORTANT -->
            <p class="mt-6">
                <a href="/notes" class="text-blue-500 underline">Go Back...</a>
            </p>

            <form class="mt-6" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name ="id" value="<?=  $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>

            <footer class="mt-6">
                <a href="note/edit?id=<?= $note['id'] ?>" class="mt-6 text-grey-500 border border-current px-3 py-1 rounded">Edit</a>
            </footer>
        </div>
    </main>


<?php require base_path('views/partials/footer.php') ?>