<template>
    <article class="pc-steps">
        <div class="pc-steps__step" @click="changeStep(1, $event)">1</div>
        <div class="pc-steps__step" :class="currentStep >= 2 ? '' : 'pc-steps__step--disabled'" @click="changeStep(2, $event)">2</div>
        <div class="pc-steps__step" :class="currentStep >= 3 ? '' : 'pc-steps__step--disabled'" @click="changeStep(3, $event)">3</div>
        <div class="pc-steps__step" :class="currentStep >= 4 ? '' : 'pc-steps__step--disabled'" @click="changeStep(4, $event)">4</div>
        <div class="pc-steps__step" :class="currentStep >= 5 ? '' : 'pc-steps__step--disabled'" @click="changeStep(5, $event)">5</div>
    </article>
</template>

<script>
export default {
    name: "WizardSteps",
    computed: {
        currentStep() {
            return this.$store.state.projects.currentStep;
        }
    },
    methods: {
        changeStep(step, e) {
            if (!e.target.classList.contains('pc-steps__step--disabled')) {
                this.$store.commit('projects/setCurrentStep', step);
            }
        }
    }
}
</script>

<style lang="scss">
.pc-steps {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
    &__step {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        padding: 10px;
        margin: 0 20px;
        text-align: center;
        font-size: 22px;
        border: 2px solid $accent-colour;
        font-family: $font-heading;
        line-height: 1;
        position: relative;
        &::before {
            content: "";
            display: inline-block;
            width: 42px;
            height: 2px;
            background-color: $accent-colour;
            position: absolute;
            top: 20px;
            right: 100%;
        }
        &:first-child::before {
            content: none;
        }
    }
    &__step:not(&__step--disabled) {
        cursor: pointer;
    }
    &__step--disabled {
        opacity: 0.2;
    }
}
</style>
