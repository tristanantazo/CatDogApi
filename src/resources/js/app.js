import "./bootstrap";

import mitt from "mitt";
import { createApp } from "vue";
// import the root component App from a single-file component.
import App from "./App.vue";

const emitter = mitt();
const app = createApp(App);

app.config.globalProperties.eventBus = emitter;
app.mount("#app");
