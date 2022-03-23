<div class="px-6 py-8">
                <div class="container flex justify-between mx-auto">
                    <div class="w-full lg:w-8/12">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-700 md:text-2xl"><?= $content['author_name'] ?></h1>
                        </div>
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between">
                                    <a href="?author=Myriam Dupont"
                                       class="flex items-center justify-end"><img
                                                src="https://via.placeholder.com/128x128.png/004466?text=people+myriam"
                                                alt="avatar"
                                                class="hidden object-cover w-10 h-10 mr-4 rounded-full sm:block">
                                        <h1 class="font-bold text-gray-700 hover:underline"><?= $content['title'] ?></h1>
                                    </a>
                                    <a href="/?category=quia aspernatur consequatur"
                                       class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500"><?= $content['category'] ?></a>
                                </div>
                                <div class="my-4">
                                    <span class="font-light text-gray-600"><?= $content['published_at'] ?></span>
                                </div>
                                <div class="mt-2 text-gray-600"><?= $content['body'] ?></div>
                            </div>
                        </div>
                    </div>