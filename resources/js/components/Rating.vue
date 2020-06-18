<template>
    <div class="stars">
        <div class="star" v-for="(star, index) in stars" @mouseenter="setFilledStars(index)" @mouseleave="setFilledStars(baseRating)" @click="setCurrentRating(index)">
            <span :class="{'star-filled':star.isFilled}"></span>
        </div>
        <slot :rating="baseRating"></slot>
    </div>
</template>

<style lang="sass">
    .stars
        display: flex
        .star
            span
                background-image: url("/images/star-empty.svg")
                display: block
                margin: 0 0.25rem 0 0.25rem
                width: 35px
                height: 35px
                cursor: pointer
                &:hover
                    background-size: contain
                    background-image: url("/images/star-filled.svg")
                &.star-filled
                    background-size: contain
                    background-image: url("/images/star-filled.svg")
</style>

<script>
    export default {
        created() {
            for (let i = 1; i <= 5; i++) {
                this.stars.push({
                    isFilled: i <= this.baseRating
                })
            }
        },
        data() {
            return {
                stars: []
            }
        },
        methods: {
            setFilledStars(index) {
                this.stars.map((star, key) => {
                    star.isFilled = index > key;
                })
            },
            setCurrentRating(index) {
                this.baseRating = index + 1
                this.setFilledStars(this.baseRating)
            }
        }
    }
</script>
