<template lang="">
    <div class="container">
        <Nav :clickTab="changeTab" />
        <!-- <CatContainer /> -->
        <!-- <DogContainer /> -->
        <!-- <HomeContainer /> -->
        <keep-alive>
            <component :is="currentTab"></component>
        </keep-alive>
        <Footer />
    </div>
</template>
<script>
import CatContainer from "./components/CatPanel/CatContainer.vue";
import DogContainer from "./components/DogPanel/DogContainer.vue";
import Footer from "./components/Footer.vue";
import HomeContainer from "./components/HomeContainer.vue";
import Nav from "./components/Nav.vue";
export default {
    components: {
        Nav,
        CatContainer,
        Footer,
        DogContainer,
        HomeContainer,
    },
    data() {
        return {
            currentTab: "HomeContainer",
        };
    },
    methods: {
        changeTab(tab) {
            this.eventBus.emit("closeAnimalForm");
            this.currentTab = tab;
        },
    },
};
</script>
<style lang="scss">
.container {
    width: 70%;
    position: relative;
    margin: 0px auto;
}
</style>
