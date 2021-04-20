import axios from "axios";

export default {
    install: (app, options) => {

        // A wrapper function for axios, used for querying the Svara API
        // Makes $api available on this in all components, eg: this.$api('/route');
        app.config.globalProperties.$api = async (route, requestType = 'GET', payload = []) => {

            // Setup the full URL and initial response object
            // const port = ':1024';
			const port = '';
            const url = `http://app.svara.cloud${port}/${route}`;
            let response = {};

            try {

                // If GET request with data, reformat URL
                let urlAppend = "";
                if (requestType === 'GET' && typeof payload === 'object' && Object.values(payload).length > 0) {
                    for (const [key, value] of Object.entries(payload)) {
                        if (urlAppend !== "") {
                            urlAppend += `&${key}=${value}`;
                        } else {
                            urlAppend += `?${key}=${value}`;
                        }
                    }
                }

                // Sends the request via axios
                response = await axios({
                    method: requestType,
                    url: `${url}${urlAppend}`,
                    data: payload,
                });

            } catch (error) {

                // If the request errors, handles appropriate codes correctly
                response.status = 'Error';
                response.data = error.response.data;

                if (error.response.status === 500) {
                    response.message = error.response.data;
                } else if (error.response.status === 401) {
                    await app.config.globalProperties.$router.push('/login');
                    response.message = error.response.data;
				} else if (error.response.status === 403) {
                	// TODO: Return to last page if possible, otherwise back to dashbaord
					// TODO: Display unauthorised message
					response.message = error.response.data.message;
					app.config.globalProperties.$store.commit('util/setGlobalNotif', { message: response.message, type: 'error' });
					if (app.config.globalProperties.$router.length > 1) {
						app.config.globalProperties.$router.go(-1);
					} else {
						await app.config.globalProperties.$router.push('/dashboard')
					}
				}

            }

            return response;

        }
    }
}
