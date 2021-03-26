<?php


namespace App\Http\Requests;


class CommentRequest extends BaseRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'username' => 'required',
            'message' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'username.required' => 'Comment user name is required.',
            'message.required' => 'Comment message is required.'
        ];
    }
}
