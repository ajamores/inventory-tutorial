
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
            <ul>
                <?php foreach($notes as $note): ?>
                    <li>

                        <a href="note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline   ">
                <!-- IMPORTANT converts special chars entered in user input to html entities. 
                    Help to prevent input like <h1 style="font-size: 10000px">AHHH</h1>

                    to 

                      &lt;h1 style=&quot;fontsize: 100px&quot;&gt;Ah Ah Ah&lt;/h1&gt;&lt;script&gt;alert(&#039;WAGWANNN&#039;)&lt;/script&gt;   
                -->
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

            <p class="mt-6">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>
        </div>
    </main>

<?php require base_path('views/partials/footer.php') ?>

