<?php
namespace App\Repositories;

use App\Models\Post as PostModel;

class Post extends BaseRepository
{
    private $post_model;
    const MAX_SHOW_COUNT_FOR_POSTS = 10;

    public function __construct(PostModel $post_model)
    {
        $this->post_model = $post_model;
    }

    /**
     * フラグがonのPostをすべて取得する
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->post_model
            ->where('show_flag', FLAG_ON)
            ->paginate(self::MAX_SHOW_COUNT_FOR_POSTS);
    }

    /**
     * Queryが一致し かつ フラグがonのPostをすべて取得する
     *
     * @return mixed
     */
    public function getAllByQuery(array $query)
    {
        $base_query = $this->post_model->where('show_flag', FLAG_ON);

        if (array_has($query, 'category')) {
            $base_query->join('category_post', 'category_post.post_id', '=', 'posts.id')
                ->join('categories', 'categories.id', '=', 'category_post.category_id')
                ->where('categories.id', $query['category']);
        }

        return $base_query->paginate(self::MAX_SHOW_COUNT_FOR_POSTS);
    }

    /**
     * 指定IDのPostを取得する
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->post_model->findOrFail($id);
    }

    /**
     * 入力からPostを作成する
     *
     * @param $input
     * @return mixed
     */
    public function create($input)
    {
        return $this->post_model->create($input);
    }
}
