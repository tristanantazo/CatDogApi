<template lang="">
    <div class="pagination-container">
        <div class="pagination-wrapper clearfix">
            <div class="prev">
                <button v-if="currentPage > 1">Prev</button>
            </div>
            <div class="page-count-wrapper clearfix">
                <div
                    class="page"
                    v-for="(item, index) in page_count"
                    :key="index"
                >
                    <button
                        :class="`${currentPage == index + 1 ? 'active' : ''}`"
                        @click="get(index + 1)"
                    >
                        {{ index + 1 }}
                    </button>
                </div>
            </div>
            <div class="next" v-if="currentPage < page_count">
                <button>Next</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["page_count", "clickEvent", "currentPage"],
    methods: {
        get(page) {
            this.clickEvent(page);
        },
    },
};
</script>
<style lang="scss">
.pagination-container {
    display: block;
    .pagination-wrapper,
    .page-count-wrapper {
        display: flex;
    }
    .page,
    .next,
    .prev {
        &:hover {
            background-color: rgb(0, 183, 255);
        }
    }
    .active {
        background-color: rgb(0, 183, 255);
    }
    button {
        width: 50px;
        height: 50px;
        border: 1px solid;
    }
}
</style>
