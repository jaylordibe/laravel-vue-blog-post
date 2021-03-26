import axios from 'axios';

export class HttpUtil {

    /**
     * Compose full API endpoint.
     * @param endpoint
     * @returns {string}
     */
    static composeApiEndpoint(endpoint) {
        const url = 'http://localhost:8000/api';
        return url.concat(endpoint);
    }

    /**
     * Get additional request headers.
     * @returns {{"Content-Type": string}}
     */
    static getRequestHeaders() {
        return {
            'Content-Type': 'application/json'
        };
    }

    /**
     * Compose endpoint with params if defined.
     * @param endpoint
     * @param params
     * @returns {*}
     */
    static composeEndpointWithParams(endpoint, params) {
        const paramKeys = Object.keys(params);

        if (paramKeys.length > 0) {
            const queryString = paramKeys.map(key => key + '=' + params[key]).join('&');

            if (queryString) {
                endpoint = endpoint.concat('?').concat(queryString);
            }
        }

        return endpoint;
    }

    /**
     * Perform GET http request.
     * @param endpoint
     * @param params
     * @returns {Promise}
     */
    static async get(endpoint, params = {}) {
        const config = {headers: this.getRequestHeaders()};
        endpoint = this.composeEndpointWithParams(endpoint, params);
        const url = this.composeApiEndpoint(endpoint);
        const response = await axios.get(url, config);

        return response.data;
    }

    /**
     * Perform POST http request.
     * @param endpoint
     * @param payload
     * @returns {Promise}
     */
    static async post(endpoint, payload) {
        const config = {headers: this.getRequestHeaders()};
        const url = this.composeApiEndpoint(endpoint);
        const response = await axios.post(url, payload, config);

        return response.data;
    }

    /**
     * Perform PUT http request.
     * @param endpoint
     * @param payload
     * @returns {Promise}
     */
    static async put(endpoint, payload) {
        const config = {headers: this.getRequestHeaders()};
        const url = this.composeApiEndpoint(endpoint);
        const response = await axios.put(url, payload, config);

        return response.data;
    }

    /**
     * Perform DELETE http request.
     * @param endpoint
     * @returns {Promise}
     */
    static async delete(endpoint) {
        const config = {headers: this.getRequestHeaders()};
        const url = this.composeApiEndpoint(endpoint);
        const response = await axios.delete(url, config);

        return response.data;
    }
}
