<?php
    $listPosts = ReadAllFiles(DIR);
?>

<div class="px-6 py-8">
                <div class="container flex justify-between mx-auto">
                    <div class="w-full lg:w-8/12">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Posts</h1>
                            <div>
    <form action="index.php"
          method="get">
        <select name="order-by"
                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="oldest">Oldest first</option>
            <option value="newest">Newest first</option>
        </select>
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md ml-1">Change
        </button>
    </form>
    
</div> 
                                <?php 
                                    foreach ($listPosts as $listPost):
                                        ?>
                                            <div class="mt-6">
                                                <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                                    <div class="flex items-center justify-between">
                                                        <span class="font-light text-gray-600">
                                                            Mar 21, 2022 - 15:41                                        </span>
                                                        <a href="?category=quia aspernatur consequatur"
                                                        class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">
                                                            Quia Aspernatur Consequatur                                        </a>
                                                    </div>
                                                    <div class="mt-2">
                                                        <a href="index.php?action=show&id=<?= $listPost ?>"
                                                        class="text-2xl font-bold text-gray-700 hover:underline">
                                                            Joni Mitchell                                        </a>
                                                        <p class="mt-2 text-gray-600">Joni Mitchell, nom de scène de Roberta Joan Anderson, née le 7 novembre 1943 à Fort Macleod, est une</p>
                                                    </div>
                                                    <div class="flex items-center justify-between mt-4">
                                                        <a href="index.php?action=show&id=62389ca7b5432"
                                                        class="text-blue-500 hover:underline">
                                                            Read more<span class="sr-only"> about Joni Mitchell</span>
                                                        </a>
                                                        <div>
                                                            <a href="?author=Myriam Dupont"
                                                            class="flex items-center">
                                                                <img src="https://via.placeholder.com/128x128.png/004466?text=people+myriam"
                                                                    alt="Myriam Dupont"
                                                                    class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                                                <span class="font-bold text-gray-700 hover:underline">Myriam Dupont</span>
                                                            </a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                    endforeach
                                ?>


                                
                            </div>