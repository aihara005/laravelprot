<?php

namespace App\Http\Controllers;

use App\Services\Post as PostService;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    private $post_service;

    public function __construct(PostService $post_service)
    {
        parent::__construct();
        $this->post_service = $post_service;
    }

    /**
     * Post一覧を表示
     *
     * @return mixed
     */
    public function index()
    {
        return $this->post_service->getAllPosts();
    }

    /**
     * 特定IDのPostを取得
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        return $this->post_service->getPostById($id);
    }

    /**
     * Postを作成する
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->post_service->createPost($request->data);
        return $this->getSuccessResponse();
    }
}
