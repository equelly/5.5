import Vue from 'vue'
import VueRouter from 'vue-router'
import PostComponent from './components/PostComponent.vue'
import ProductComponent from './components/ProductComponent.vue'

import { createApp } from 'vue';
const app = createApp({});

Vue.use(VueRouter);

export default new VueRouter(  {
    mode: 'history',
    routes:[
        {
        path:'/posts',
        component: PostComponent,
        },
        {
            path:'/products',
            component: ProductComponent,
            }
    ]
})
