<?php


namespace App\Repositories\Implementation;


use App\Constants\AppConstant;
use App\Http\Requests\Request;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CommentRepositoryImplementation implements CommentRepository {

    private const RELATIONS = [
        'replies'
    ];

    /**
     * CommentRepositoryImplementation constructor.
     */
    public function __construct() {
    }

    /**
     * @inheritDoc
     */
    public function get(Request $request): LengthAwarePaginator {
        $parentId = $request->getInputAsInt('parentId');

        if (empty($parentId)) {
            $parentId = null;
        }

        return Comment::with(self::RELATIONS)
            ->where('parent_id', $parentId)
            ->orderByDesc('created_at')
            ->paginate(AppConstant::DEFAULT_PAGE_LIMIT);
    }
}
