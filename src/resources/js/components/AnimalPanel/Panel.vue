<template lang="">
    <div class="panel-container">
        <AnimalInfo :info="info" v-show="infoShow" />
        <div class="panel clearfix" v-show="!infoShow">
            <div
                class="box-wrapper"
                v-for="(item, index) in boxData.results"
                :key="index"
            >
                <Box :readMore="readMore" :item="item" />
            </div>
            <Pagination
                :currentPage="boxData.page"
                :page_count="boxData.total_page_count"
                :clickEvent="getPage"
            />
        </div>
    </div>
</template>
<script>
import AnimalInfo from "./AnimalInfo.vue";
import Box from "./Box.vue";
import Pagination from "./Pagination.vue";
export default {
    components: {
        Box,
        Pagination,
        AnimalInfo,
    },
    props: ["panel_data"],
    data() {
        return {
            boxData: [],
            infoShow: false,
            info: [],
        };
    },
    watch: {
        panel_data(newVal, oldVal) {
            this.boxData = newVal;
        },
    },
    created() {
        this.eventBus.on("closeAnimalForm", () => {
            this.infoShow = false;
        });
    },
    methods: {
        getPage(page) {
            axios
                .get(`/api/v1/cats-and-dogs`, {
                    params: {
                        page: page,
                        limit: 20,
                    },
                })
                .then((response) => {
                    this.boxData = response.data;
                });
        },
        readMore(animal) {
            this.infoShow = true;
            this.info = animal;
        },
    },
};
</script>
<style lang="scss">
.panel-container {
    margin: 20px 0;
}
.panel {
    width: 95%;
    margin: 0px auto;
    display: flex;
    flex-wrap: wrap;
    .box-wrapper {
        width: 20%;
    }
}
</style>
