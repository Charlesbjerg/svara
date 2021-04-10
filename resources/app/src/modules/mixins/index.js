export default {
    install: (app, options) => {

        // A simple helper function to consistently format dates
        app.config.globalProperties.$dateFormatter = (dateString, includeTime = true) => {

            const date = new Date(dateString);
            let string = `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;

            if (includeTime) {
                string += ` - ${date.getHours()}:${date.getMinutes()}`;
            }

            return string;

        }
    }
}
