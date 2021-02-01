import axios from "axios";

// Simple method for working with the API
async function api(route, requestType, payload) {

    const url = `http://app.svara.io/${route}`;

    const response = await axios({
        method: requestType,
        url: route,
        data: payload,
    });

    if (response.status === 500) {
        console.log(response.statusText);
    }

    return response;

}

export default api;
