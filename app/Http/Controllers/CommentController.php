<?php


namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Http\Requests\Request;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentsResource;
use App\Services\CommentService;
use App\Utils\ResponseUtil;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller {

    private CommentService $commentService;

    /**
     * CommentController constructor.
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService) {
        $this->commentService = $commentService;
    }

    /**
     * Create/add a comment to a blog post.
     * @param CommentRequest $request
     * @return CommentResource|JsonResponse
     */
    public function create(CommentRequest $request) {
        $request->validated();
        $comment = $this->commentService->create($request);

        if ($comment->isEmpty()) {
            return ResponseUtil::unauthorized();
        }

        return new CommentResource($comment);
    }

    /**
     * Get comments.
     * @param Request $request
     * @return CommentsResource
     */
    public function get(Request $request) {
        $comments = $this->commentService->get($request);
        return new CommentsResource($comments);
    }
}
