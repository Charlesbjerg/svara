<template>
    <div class="nav">
        <div class="nav__logo">
            <svg id="Group_84" data-name="Group 84" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.396 490.398">
                <defs>
                    <linearGradient id="linear-gradient" x1="0.237" y1="1.472" x2="1.53" y2="0.818"
                                    gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#8515db"/>
                        <stop offset="1" stop-color="#d201fa"/>
                    </linearGradient>
                </defs>
                <g id="Group_62" data-name="Group 62">
                    <path id="Path_110" data-name="Path 110"
                          d="M136.182,191.393,64.744,315.139H207.626Zm75.5,107.125V217.75l-60.6-24.2Zm0,110.529v-82.1h-47.4ZM126.87,183.889,68.153,160.445l36.124,62.57Zm16.945-29.347H85.24l47.6,19Zm206.12,0H291.36l10.972,19ZM217.588,50.395,145.133,175.9H290.042Z"
                          transform="translate(27.61 10.361)" fill="url(#linear-gradient)"/>
                    <path id="Path_111" data-name="Path 111"
                          d="M268,22.806c-135.42,0-245.2,109.778-245.2,245.2S132.583,513.2,268,513.2,513.2,403.425,513.2,268,403.424,22.806,268,22.806ZM436.2,351.254a5.908,5.908,0,0,1-5.117,8.862h-96.13L273.114,467.224a5.908,5.908,0,0,1-10.233,0L201.056,360.116h-96.13a5.908,5.908,0,0,1-5.123-8.862L147.868,268,99.8,184.755a5.908,5.908,0,0,1,5.117-8.863H201.05L262.887,68.785c2.109-3.657,8.124-3.657,10.233,0l61.837,107.108h96.13a5.909,5.909,0,0,1,5.117,8.863L388.133,268Z"
                          transform="translate(-22.806 -22.806)" fill="url(#linear-gradient)"/>
                    <path id="Path_112" data-name="Path 112"
                          d="M274.348,162.944l36.13-62.576-58.729,23.445ZM171,255.056H313.881L242.443,131.322Zm-4.053-16.614,60.6-104.969-60.6,24.195ZM111.785,127.636,161.037,147.3l49.252-19.669Zm55.161,221.335,47.4-82.092h-47.4Z"
                          transform="translate(84.16 70.437)" fill="url(#linear-gradient)"/>
                </g>
            </svg>
        </div>
        <nav class="nav__links">
            <router-link to="/dashboard" class="nav__link" v-if="userLoggedIn">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="23.28"
                    viewBox="0 0 25 23.28"
                    class="nav__link-icon"
                >
                    <g id="home-icon-silhouette" transform="translate(0 -17.047)">
                        <g
                            id="Group_15"
                            data-name="Group 15"
                            transform="translate(0.001 17.047)"
                        >
                            <g id="Group_14" data-name="Group 14" transform="translate(0 0)">
                                <path
                                    id="Path_40"
                                    data-name="Path 40"
                                    d="M24.581,27.927l-3.789-3.919V19.482a1.434,1.434,0,1,0-2.866,0v1.563l-2.821-2.918a3.68,3.68,0,0,0-5.211,0L.42,27.927a1.519,1.519,0,0,0,0,2.1,1.4,1.4,0,0,0,2.027,0l9.473-9.8a.826.826,0,0,1,1.159,0l9.474,9.8a1.4,1.4,0,0,0,2.027,0A1.518,1.518,0,0,0,24.581,27.927Z"
                                    transform="translate(-0.001 -17.047)"
                                    fill="#06062c"
                                />
                                <path
                                    id="Path_41"
                                    data-name="Path 41"
                                    d="M78.036,127.961a.672.672,0,0,0-.982,0l-8.224,8.616a.748.748,0,0,0-.2.515v6.284a2.611,2.611,0,0,0,2.548,2.67h4.072v-6.608h4.6v6.608h4.072a2.611,2.611,0,0,0,2.548-2.67v-6.284a.745.745,0,0,0-.2-.515Z"
                                    transform="translate(-65.045 -122.767)"
                                    fill="#06062c"
                                />
                            </g>
                        </g>
                    </g>
                </svg>
                Home
            </router-link>
            <router-link to="/projects" class="nav__link" v-if="canAccess(['staff', 'manager', 'owner'])">
                <svg
                    id="jigsaw"
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    viewBox="0 0 25 25"
                    class="nav__link-icon"
                >
                    <path
                        id="Path_42"
                        data-name="Path 42"
                        d="M182.921,5.219a1.046,1.046,0,1,0,0,2.091h3.429v4.744h3.236V10.193a2.539,2.539,0,0,1,5.079,0v1.861h3.648V3.6a3.6,3.6,0,0,0-3.6-3.6H186.35V5.187Z"
                        transform="translate(-173.313)"
                    />
                    <path
                        id="Path_43"
                        data-name="Path 43"
                        d="M278.571,184.747a1.046,1.046,0,1,0-2.091,0V188.1h-4.73v3.111h1.861a2.539,2.539,0,0,1,0,5.079H271.75v3.756h8.366a3.6,3.6,0,0,0,3.6-3.6V188.1h-5.142Z"
                        transform="translate(-258.713 -175.048)"
                    />
                    <path
                        id="Path_44"
                        data-name="Path 44"
                        d="M4.978,15.483a1.046,1.046,0,1,0,2.091,0V12.054h4.968V8.8H10.1a2.539,2.539,0,0,1,0-5.079l1.94-.018V0H3.6A3.6,3.6,0,0,0,0,3.6v8.457H4.947Z"
                        transform="translate(0 0)"
                    />
                    <path
                        id="Path_45"
                        data-name="Path 45"
                        d="M15.392,278.772a1.046,1.046,0,1,0,0-2.091H12.037v-4.6H8.563v1.936a2.539,2.539,0,0,1-5.079,0l-.018-1.94H0v8.349a3.6,3.6,0,0,0,3.6,3.6h8.44v-5.25Z"
                        transform="translate(0 -259.022)"
                    />
                </svg>
                Projects
            </router-link>
            <router-link to="/clients" class="nav__link" v-if="canAccess(['staff', 'manager', 'owner'])">
				<svg class="nav__link-icon" id="bold" enable-background="new 0 0 24 24" height="25" viewBox="0 0 24 24" width="25" xmlns="http://www.w3.org/2000/svg"><path d="m15 6.5c-.552 0-1-.448-1-1v-1.5h-4v1.5c0 .552-.448 1-1 1s-1-.448-1-1v-1.5c0-1.103.897-2 2-2h4c1.103 0 2 .897 2 2v1.5c0 .552-.448 1-1 1z"/><path d="m12.71 15.38c-.18.07-.44.12-.71.12s-.53-.05-.77-.14l-11.23-3.74v7.63c0 1.52 1.23 2.75 2.75 2.75h18.5c1.52 0 2.75-1.23 2.75-2.75v-7.63z"/><path d="m24 7.75v2.29l-11.76 3.92c-.08.03-.16.04-.24.04s-.16-.01-.24-.04l-11.76-3.92v-2.29c0-1.52 1.23-2.75 2.75-2.75h18.5c1.52 0 2.75 1.23 2.75 2.75z"/></svg>
                Clients
            </router-link>
            <router-link to="/teams" class="nav__link" v-if="canAccess(['staff', 'manager', 'owner'])">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="20.783"
                    viewBox="0 0 25 20.783"
                    class="nav__link-icon"
                >
                    <g id="group" transform="translate(0 -38.84)">
                        <g
                            id="Group_17"
                            data-name="Group 17"
                            transform="translate(19.569 50.06)"
                        >
                            <g id="Group_16" data-name="Group 16">
                                <path
                                    id="Path_46"
                                    data-name="Path 46"
                                    d="M400.389,273.32h-1.895a4.929,4.929,0,0,1,.3,1.694v7.161a2.112,2.112,0,0,1-.122.707H401.8a2.124,2.124,0,0,0,2.122-2.122v-3.9A3.541,3.541,0,0,0,400.389,273.32Z"
                                    transform="translate(-398.494 -273.32)"
                                />
                            </g>
                        </g>
                        <g
                            id="Group_19"
                            data-name="Group 19"
                            transform="translate(0 50.06)"
                        >
                            <g id="Group_18" data-name="Group 18">
                                <path
                                    id="Path_47"
                                    data-name="Path 47"
                                    d="M5.133,275.015a4.928,4.928,0,0,1,.3-1.694H3.537A3.541,3.541,0,0,0,0,276.858v3.9a2.124,2.124,0,0,0,2.122,2.122H5.254a2.112,2.112,0,0,1-.122-.707Z"
                                    transform="translate(0 -273.321)"
                                />
                            </g>
                        </g>
                        <g
                            id="Group_21"
                            data-name="Group 21"
                            transform="translate(6.797 48.218)"
                        >
                            <g id="Group_20" data-name="Group 20" transform="translate(0 0)">
                                <path
                                    id="Path_48"
                                    data-name="Path 48"
                                    d="M144.7,234.815h-4.332a3.541,3.541,0,0,0-3.537,3.537v7.161a.707.707,0,0,0,.707.707h9.99a.707.707,0,0,0,.707-.707v-7.161A3.541,3.541,0,0,0,144.7,234.815Z"
                                    transform="translate(-136.829 -234.815)"
                                />
                            </g>
                        </g>
                        <g
                            id="Group_23"
                            data-name="Group 23"
                            transform="translate(8.247 38.84)"
                        >
                            <g id="Group_22" data-name="Group 22" transform="translate(0 0)">
                                <path
                                    id="Path_49"
                                    data-name="Path 49"
                                    d="M171.367,38.84a4.253,4.253,0,1,0,4.253,4.253A4.258,4.258,0,0,0,171.367,38.84Z"
                                    transform="translate(-167.114 -38.84)"
                                />
                            </g>
                        </g>
                        <g
                            id="Group_25"
                            data-name="Group 25"
                            transform="translate(1.6 42.804)"
                        >
                            <g id="Group_24" data-name="Group 24">
                                <path
                                    id="Path_50"
                                    data-name="Path 50"
                                    d="M36.624,121.689A3.179,3.179,0,1,0,39.8,124.87,3.185,3.185,0,0,0,36.624,121.689Z"
                                    transform="translate(-33.443 -121.689)"
                                />
                            </g>
                        </g>
                        <g
                            id="Group_27"
                            data-name="Group 27"
                            transform="translate(17.038 42.804)"
                        >
                            <g id="Group_26" data-name="Group 26">
                                <path
                                    id="Path_51"
                                    data-name="Path 51"
                                    d="M348.788,121.689a3.181,3.181,0,1,0,3.181,3.181A3.185,3.185,0,0,0,348.788,121.689Z"
                                    transform="translate(-345.607 -121.689)"
                                />
                            </g>
                        </g>
                    </g>
                </svg>
                Teams
            </router-link>
            <router-link to="/company" class="nav__link" v-if="canAccess(['owner'])">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25.009"
                    viewBox="0 0 25 25.009"
                    class="nav__link-icon"
                >
                    <g id="business-and-trade" transform="translate(0 -0.178)">
                        <path
                            id="Path_29"
                            data-name="Path 29"
                            d="M13.68,1.954,2.142.2A1.861,1.861,0,0,0,.651.611,1.877,1.877,0,0,0,0,2.017v22.12a1.053,1.053,0,0,0,1.05,1.05H4.462V19.676A1.833,1.833,0,0,1,6.3,17.839H8.924a1.833,1.833,0,0,1,1.837,1.837v5.512h4.462V3.771A1.838,1.838,0,0,0,13.68,1.954ZM5.774,15.476H4.2a.787.787,0,1,1,0-1.575H5.774a.787.787,0,0,1,0,1.575Zm0-3.15H4.2a.787.787,0,1,1,0-1.575H5.774a.787.787,0,1,1,0,1.575Zm0-3.15H4.2A.787.787,0,1,1,4.2,7.6H5.774a.787.787,0,0,1,0,1.575Zm0-3.15H4.2a.787.787,0,1,1,0-1.575H5.774a.787.787,0,1,1,0,1.575Zm5.249,9.449H9.449a.787.787,0,0,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H9.449a.787.787,0,1,1,0-1.575h1.575a.787.787,0,1,1,0,1.575Zm0-3.15H9.449a.787.787,0,0,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H9.449a.787.787,0,1,1,0-1.575h1.575a.787.787,0,1,1,0,1.575Z"
                            transform="translate(0 0)"
                        />
                        <path
                            id="Path_30"
                            data-name="Path 30"
                            d="M22.975,10.916,15.5,9.351V24.73h7.086a1.839,1.839,0,0,0,1.837-1.837V12.712A1.828,1.828,0,0,0,22.975,10.916ZM20.487,21.581H18.912a.787.787,0,0,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H18.912a.787.787,0,1,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H18.912a.787.787,0,1,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Z"
                            transform="translate(0.576 0.457)"
                        />
                    </g>
                </svg>
                Company
            </router-link>
        </nav>
        <button @click="logout" class="nav__link nav__link--logout" v-if="userLoggedIn">Logout</button>
        <footer class="nav__profile" >
            <div class="user" v-if="userLoggedIn && user">
                <div class="user__avatar">
                    <!-- TODO: Add users image -->
                </div>
                <strong class="user__name">{{ user.name }}</strong>
                <p class="user__role">{{ user.jobRole }}</p>
            </div>
        </footer>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: "Navigation.vue",
    computed: {
    	...mapGetters({
			user: 'auth/getUser',
			userLoggedIn: 'auth/isUserAuthenticated',
		}),
    },
	data() {
		return {
			types: [
				{ key: 0, label: 'staff' },
				{ key: 1, label: 'manager' },
				{ key: 2, label: 'owner' },
				{ key: 3, label: 'client' },
			],
		}
	},
    methods: {
        canAccess(types) {
        	const userType = this.types.find(type => type.key === this.user.typeId);
			let typesFound = [];
			if (userType !== undefined) {
	        	typesFound = types.find(type => type === userType.label);
			}
			return typesFound !== undefined && typesFound.length > 0;
        },
    	async logout() {
            const response = await this.$api('api/auth/logout', 'POST');
            if (response.data.success) {
                this.$router.push('/login');
                this.$store.commit('auth/unsetUser');
            }
        },
    }
};
</script>

<style lang="scss" scoped>
.nav {
    height: 100%;
    padding: 30px 40px;
    display: flex;
    flex-direction: column;
    @include box-shadow;

    &__logo {
        display: flex;
        justify-content: center;

        svg {
            max-width: 100px;
        }
    }

    &__links {
        margin: 30px 0;
        flex-grow: 1;
    }

    &__link {
        display: flex;
        align-items: center;
        background-color: #fff;
        text-decoration: none;
        border: 0;
        padding: 15px 0;
        margin: 0;
        font-family: $font-heading;
        font-size: 18px;
        color: #000;
        line-height: 1em;
        @include transition-default;

        &:hover,
        &.router-link-active {
            color: $accent-colour;

            svg {
                fill: $accent-colour;
            }
        }
    }

    &__link-icon {
        margin-right: 10px;
    }
    &__link--logout {
        cursor: pointer;
    }
}
.user {
    background-color: $light-grey;
    padding: 10px;
    border-radius: $border-radius;
    margin-bottom: 5px;
    @include box-shadow-sm;
    //text-align: center;
    &__role {
        margin: 0 0 5px;
    }
}
</style>
