<?php


namespace App\Http\Controllers;


class PageController extends Controller {

    /**
     * PageController constructor.
     */
    public function __construct() {
    }

    public function loadBlogPostPage() {
        return view('blog-post');
    }
}
