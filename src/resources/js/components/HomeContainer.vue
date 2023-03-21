<template lang="">
    <div class="home-container">
        <Panel :panel_data="panel_data" />
    </div>
</template>
<script>
import Panel from "./AnimalPanel/Panel.vue";
export default {
    components: {
        Panel,
    },
    data() {
        return {
            panel_data: [],
        };
    },
    created() {
        axios
            .get(`/api/v1/cats-and-dogs`, {
                params: {
                    page: 1,
                    limit: 20,
                },
            })
            .then((response) => {
                this.panel_data = response.data;
            });
    },
};
</script>
<style lang=""></style>
