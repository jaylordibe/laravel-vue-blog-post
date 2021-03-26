<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'createdAt' => $this->created_at ? $this->created_at->getTimestamp() : null,
            'postId' => $this->post_id,
            'parentId' => $this->parent_id,
            'username' => $this->username,
            'message' => $this->message
        ];
    }
}
