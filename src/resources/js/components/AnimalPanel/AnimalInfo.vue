<template lang="">
    <div class="animalinfo-container">
        <div class="wrapper clearfix">
            <div class="left">
                <img :src="imageSrc" alt="" />
            </div>
            <div class="right">
                <h1>{{ info.name }}</h1>
                <div class="dog-info" v-if="info.animal_type == 'dog'">
                    <p><span> Bred for: </span> {{ info.bred_for }}</p>
                    <p><span>Bred Group: </span> {{ info.bred_group }}</p>
                    <p><span>Life Span: </span> {{ info.life_span }}</p>
                    <p>
                        <span>Height (Metric): </span> {{ info.height.metric }}
                    </p>
                    <p>
                        <span>Weight (Metric): </span> {{ info.weight.metric }}
                    </p>
                </div>
                <div class="cat-info" v-else>
                    <p><span>Origin:</span> {{ info.origin }}</p>
                    <p><span>Temperament:</span> {{ info.temperament }}</p>
                    <p><span>Life Span:</span> {{ info.life_span }}</p>
                </div>
            </div>
        </div>
        <p v-if="info.animal_type == 'dog'" class="info">
            {{ info.temperament }}
        </p>
        <p v-else class="info">{{ info.description }}</p>
    </div>
</template>
<script>
export default {
    props: ["info"],
    computed: {
        imageSrc() {
            let cat_url = "https://cdn2.thecatapi.com/images";
            let dog_url = "https://cdn2.thedogapi.com/images";
            let img = "";
            if (this.info.animal_type == "dog") {
                img = `${dog_url}/${this.info.reference_image_id}.jpg`;
            } else {
                img = `${cat_url}/${this.info.reference_image_id}.jpg`;
            }
            return img;
        },
    },
};
</script>
<style lang="scss">
.animalinfo-container {
    .wrapper {
        width: 100%;
        margin-bottom: 20px;
        .left {
            float: left;
            width: 50%;
        }
        .right {
            width: 50%;
            float: right;
            padding: 20px;
            h1 {
                font-size: 1.5rem;
                font-weight: bold;
                margin-bottom: 20px;
            }
        }
        img {
            min-height: 400px;
            width: 100%;
            margin: 0px auto;
        }
    }
    .cat-info,
    .dog-info {
        p {
            margin-bottom: 20px;
            span {
                font-weight: bold;
            }
        }
    }
}
</style>
