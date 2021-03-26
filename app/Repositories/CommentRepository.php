<?php


namespace App\Repositories;


use App\Http\Requests\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CommentRepository {

    /**
     * Get comments.
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function get(Request $request): LengthAwarePaginator;
}
