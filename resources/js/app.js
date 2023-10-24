import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue/dist/vue.esm-bundler';
import HelloVue from './components/HelloVue.vue';

const app = createApp(

// );
    {
    components: {
        HelloVue,
    }
});

app.mount('#app');
