import './bootstrap';
import '../css/app.css';
import Icon from '@/Components/Icon.vue';
import { createApp, h} from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';


window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: false,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})



// Vue.filter('timeAgo', function(created){
//     return moment(created).fromNow();
// })

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),

    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('icon', Icon)
            .mount(el);

    },
});

InertiaProgress.init({ color: '#4B5563' });

// new Vue({
//     render: (h) =>
//     h(InertiApp,{
//         props: {
//             initialPage: JSON.parse(app.dataset.page),
//             resolveComponent: (name) => require(`.Pages/${name}`).default
//         },
//     }),
// }).$mount(app);
