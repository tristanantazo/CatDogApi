<template lang="">
    <div class="box">
        <div class="details">
            <img :src="imageSrc" alt="" />
            <div class="sentence">
                <h3>{{ item.name }}</h3>
                <p>{{ item.temperament }}</p>
            </div>
            <button @click="read(item)">Read More</button>
        </div>
    </div>
</template>
<script>
export default {
    props: ["readMore", "item"],
    computed: {
        imageSrc() {
            let cat_url = "https://cdn2.thecatapi.com/images";
            let dog_url = "https://cdn2.thedogapi.com/images";
            let img = "";
            if (this.item.animal_type == "dog") {
                img = `${dog_url}/${this.item.reference_image_id}.jpg`;
            } else {
                img = `${cat_url}/${this.item.reference_image_id}.jpg`;
            }
            return img;
        },
    },
    methods: {
        read(animal) {
            this.readMore(animal);
        },
    },
};
</script>
<style lang="scss">
.box {
    width: 100%;
    height: 400px;
    padding: 10px;
    .details {
        border: 1px solid rgb(172, 172, 172);
        height: 100%;
        img {
            width: 100%;
            height: 150px;
            margin-bottom: 10px;
        }
        .sentence {
            margin: 0px 10px 10px 10px;
            height: 140px;
            overflow: scroll;
            h3 {
                font-size: 1.2rem;
            }
        }
        button {
            background-color: rgb(0, 183, 255);
            color: white;
            padding: 10px;
            border-radius: 10px;
            margin: 0px 10px;
        }
    }
}
</style>
