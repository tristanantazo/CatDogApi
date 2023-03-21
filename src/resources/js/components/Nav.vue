<template lang="">
    <div class="nav">
        <a href="#" @click="changeTab('HomeContainer')">Home</a>
        <a href="#" @click="changeTab('CatContainer')">Cats</a>
        <a href="#" @click="changeTab('DogContainer')">Dogs</a>
    </div>
</template>
<script>
export default {
    props: ["clickTab"],
    methods: {
        changeTab(tab) {
            this.clickTab(tab);
        },
    },
};
</script>
<style lang="scss">
.nav {
    background-color: rgb(0, 183, 255);
    height: 50px;
    line-height: 45px;
    a {
        padding: 20px;
    }
}
</style>
