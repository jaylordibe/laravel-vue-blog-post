<?php


namespace App\Services;


use App\Http\Requests\CommentRequest;
use App\Http\Requests\Request;
use App\Models\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CommentService {

    /**
     * Create/add a comment.
     * @param CommentRequest $request
     * @return Comment
     */
    public function create(CommentRequest $request): Comment;

    /**
     * Get comments.
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function get(Request $request): LengthAwarePaginator;
}
