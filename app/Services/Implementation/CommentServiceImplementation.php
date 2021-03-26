<?php


namespace App\Services\Implementation;


use App\Http\Requests\CommentRequest;
use App\Http\Requests\Request;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use App\Services\CommentService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CommentServiceImplementation implements CommentService {

    private CommentRepository $commentRepository;

    /**
     * CommentServiceImplementation constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(CommentRequest $request): Comment {
        $parentId = $request->getInputAsInt('parentId');

        $comment = new Comment();
        $comment->username = $request->getInputAsString('username');
        $comment->message = $request->getInputAsString('message');

        if (!empty($parentId)) {
            $comment->parent_id = $parentId;
        }

        $comment->save();

        return $comment;
    }

    /**
     * @inheritDoc
     */
    public function get(Request $request): LengthAwarePaginator {
        return $this->commentRepository->get($request);
    }
}
