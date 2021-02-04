import axios from "axios";

export default {
  install: (app, options) => {

    // A wrapper function for axios, used for querying the Svara API
    app.config.globalProperties.$api = async (route, requestType, payload = []) => {

      // Setup the full URL and initial response object
      const url = `http://app.svara.io/${route}`;
      let response = {};

      try {

        // Sends the request via axios
        response = await axios({
          method: requestType,
          url: route,
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
        }

      }

      return response;

    }
  }
}
