<?php
namespace Controllers;
use stdClass;
use Cocur\Slugify\Slugify;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Models\Author;
use Models\Category;
use Models\Post;
use Request\Validators\StorePostRequest;

class PostController
{
    use StorePostRequest;
    public function __construct(
        public readonly Post $post_model = new Post(),
        public readonly Author $author_model = new Author(),
        public readonly Category $category_model = new Category()
    ){}
    public function index(): stdClass
    {
        // Order setting from request
        $sort_order = isset($_GET['order-by']) && $_GET['order-by'] === 'oldest' ? 'ASC' : DEFAULT_SORT_ORDER;

        // Filter setting from request
        $filter = [];
        if (isset($_GET['category'])) {
            $filter['type'] = 'category';
            $filter['value'] = $_GET['category'];
            define('POSTS_COUNT', $this->post_model->count_by_category($_GET['category']));
        } elseif (isset($_GET['author'])) {
            $filter['type'] = 'author';
            $filter['value'] = $_GET['author'];
            define('POSTS_COUNT', $this->post_model->count_by_author($_GET['author']));
        } else {
            define('POSTS_COUNT', $this->post_model->count());
        }

        // Pagination setting from request
        define('MAX_PAGE', intdiv(POSTS_COUNT, PER_PAGE) + (POSTS_COUNT % PER_PAGE ? 1 : 0));

        $p = START_PAGE;
        if (isset($_GET['p'])) {
            if ((int) $_GET['p'] >= START_PAGE && (int) $_GET['p'] <= MAX_PAGE) {
                $p = (int) $_GET['p'];
            }
        }

        // Main data for request
        $posts = $this->post_model->get($filter, $sort_order, $p);

        // Aside data
        $authors = $this->author_model->get();
        $categories = $this->category_model->get();
        $most_recent_post = $this->post_model->latest();

        // Rendering
        $view_data = new stdClass();
        $view_data->name = 'index.php';
        $view_data->data = compact('posts', 'authors', 'categories', 'most_recent_post', 'p');
        return $view_data;
    }

    public function create(): stdClass
    {

        $authors = $this->author_model->get();
        $categories = $this->category_model->get();
        $most_recent_post = $this->post_model->latest();

        $view_data = new stdClass();
        $view_data->name = 'add-post.php';
        $view_data->data = compact('authors', 'categories', 'most_recent_post');
        return $view_data;
    }

    public function show(): stdClass
    {

        if (!isset($_GET['slug'])) {
            header('location: 404.php'); // Idéalement 404
            exit;
        }
        $post = $this->post_model->find_by_slug($_GET['slug']);

        if (!$post) {
            header('Location: 404.php'); // Idéalement 404
            exit;
        }
        $this->post_model->add_categories($post);

        $authors = $this->author_model->get();
        $categories = $this->author_model->get();
        $most_recent_post = $this->post_model->latest();

        $view_data = new stdClass();
        $view_data->name = 'single.php';
        $view_data->data = compact('post', 'authors', 'categories', 'most_recent_post');

        return $view_data;
    }

    public function store(): void
    {

        if (!$this->has_validation_errors()) {
            $slugify = new Slugify();
            $post = new stdClass();
            $post->id = Uuid::uuid4();
            $post->title = $_POST['post-title'];
            $post->slug = $slugify->slugify($post->title);
            $post->body = $_POST['post-body'];
            $post->excerpt = $_POST['post-excerpt'];
            $post->category_id = $_POST['post-category'];
            $post->thumbnail = '';
            $post->published_at = Carbon::now();
            $authors = $this->author_model->get();
            $count_authors = count($authors);
            $author = $authors[rand(0, $count_authors - 1)];
            $post->author_id = $author->id;
            $post->author_avatar = $author->avatar;

            $result = $this->post_model->save($post);
            if ($result === true) {
                header('Location: index.php?action=show&resource=post&slug='.$post->slug);
            } else {
                die($result);
            };
        } else {
            $_SESSION['old'] = $_POST;
            header('Location: index.php?action=create&resource=post');
        }
    }
}
