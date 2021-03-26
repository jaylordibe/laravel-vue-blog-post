import {HttpUtil} from "../utils/http.util";

export class CommentService {

    constructor() {
    }

    /**
     * Create/add a comment.
     * @param payload
     * @returns {Promise}
     */
    static create(payload) {
        const endpoint = '/comments';
        return HttpUtil.post(endpoint, payload);
    }

    /**
     * Get comments.
     * @param params
     * @returns {Promise}
     */
    static get(params = {}) {
        const endpoint = '/comments';
        return HttpUtil.get(endpoint, params);
    }
}
