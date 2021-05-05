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

        // Time difference
		app.config.globalProperties.$timeDifference = timestamp => {

        	let differenceString = '';

        	// Get times for calculations
        	let currentTime = new Date();
        	let pastTime = new Date(timestamp);

        	// Get difference in days/hours/minutes/seconds
			let difference = currentTime.getTime() - pastTime.getTime();

			let daysDifference = Math.floor(difference/1000/60/60/24);
			difference -= daysDifference*1000*60*60*24

			let hoursDifference = Math.floor(difference/1000/60/60);
			difference -= hoursDifference*1000*60*60

			let minutesDifference = Math.floor(difference/1000/60);
			difference -= minutesDifference*1000*60

			let secondsDifference = Math.floor(difference/1000);

			// Update the string to use the most appropriate time period
			if (secondsDifference > 0) {
				const plural = secondsDifference > 1 ? 's' : '';
				differenceString = `${secondsDifference} Second${plural} ago`;
			}

			if (minutesDifference > 0) {
				const plural = minutesDifference > 1 ? 's' : '';
				differenceString = `${minutesDifference} Minute${plural} ago`;
			}

			if (hoursDifference > 0) {
				const plural = hoursDifference > 1 ? 's' : '';
				differenceString = `${hoursDifference} Hour${plural} ago`;
			}

			if (daysDifference > 0) {
				const plural = daysDifference > 1 ? 's' : '';
				differenceString = `${daysDifference} Day${plural} ago`;
			}

			// Return as a string
			return differenceString;

		}

    }
}
