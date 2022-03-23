<?php 
$error = array();
$error['title'] = 0;
$error['exerpt'] = 0;
$error['body'] = 0;
$error['cat'] = 0;
    if ($action === 'store') {
        $error = verifData();
    }
?>
<div class="px-6 py-8">
                <div class="container flex justify-between mx-auto">
                    <div class="w-full lg:w-8/12">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Create Post</h1>
                        </div>
                        <div class="mt-6">
                            <form action="/"
                                  method="post">
                                  <?php if ($error['title'] == 1):?>
                                    <label for="post-title"
                                       class="block mb-2">Post
                                    Title</label>
                                                                <input id="post-title"
                                       type="text"
                                          value= '<?= $_POST['post-title'] ?>'
                                       name="post-title"
                                                                           class="w-full rounded-md border-red-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <?php 
                                else:
                                ?>
                                    <label for="post-title"
                                       class="block mb-2">Post
                                    Title</label>
                                                                <input id="post-title"
                                       type="text"
                                          value= '<?php if(isset($_POST['post-title'])) {echo $_POST['post-title'];} ?>'
                                       name="post-title"
                                                                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <?php 
                                endif ?>
                                
                                <?php if ($error['exerpt'] == 1):?>
                                    <label for="post-excerpt"
                                       class="block mt-8 mb-2">Post
                                    Excerpt</label>
                                                                <textarea name="post-excerpt"
                                          id="post-excerpt"
                                          rows="5"
                                          class="w-full rounded-md border-red-300 border-red-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"><?php if(isset($_POST['post-excerpt'])) {echo $_POST['post-excerpt'];} ?></textarea>
                                <?php 
                                else:
                                ?>
                                    <label for="post-excerpt"
                                       class="block mt-8 mb-2">Post
                                    Excerpt</label>
                                                                <textarea name="post-excerpt"
                                          id="post-excerpt"
                                          rows="5"
                                          class="w-full rounded-md border-gray-300 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"><?php if(isset($_POST['post-excerpt'])) {echo $_POST['post-excerpt'];} ?></textarea>
                                <?php 
                                endif ?>
                                          <?php if ($error['body'] == 1):?>
                                            <label for="post-body"
                                       class="block mt-8 mb-2">Post
                                    Body</label>
                                                                <textarea name="post-body"
                                          id="post-body"
                                          rows="10"
                                          class="w-full rounded-md border-red-300 border-red-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"><?php if(isset($_POST['post-body'])) {echo $_POST['post-body'];} ?></textarea>
                                <?php 
                                else:
                                ?>
                                    <label for="post-body"
                                       class="block mt-8 mb-2">Post
                                    Body</label>
                                                                <textarea name="post-body"
                                          id="post-body"
                                          rows="10"
                                          class="w-full rounded-md border-gray-300 border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"><?php if(isset($_POST['post-body'])) {echo $_POST['post-body'];} ?></textarea>
                                <?php 
                                endif ?>










                                <label for="post-category"
                                       class="block mt-8 mb-2">Post
                                    Category</label>
                                                                <select name="post-category"
                                        id="post-category"
                                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                                            <option value="error commodi" >Error Commodi</option>
                                                                            <option value="quia aspernatur consequatur" >Quia Aspernatur Consequatur</option>
                                                                            <option value="ut ut" >Ut Ut</option>
                                                                            <option value="modi laborum officia" >Modi Laborum Officia</option>
                                                                    </select>
                                <input type="hidden"
                                       name="action"
                                       value="store">
                                <button type="submit"
                                        class="float-right mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                    Create new post
                                </button>
                            </form>
                        </div>
                    </div>