import { config } from '_/config/config'
import { customRoutes } from '~/router/router'
import VueRouter from 'vue-router'
import Vue from 'vue';

import {
  Dashboard,
  Auth,
  Users,
  UserForm,
  Pages,
  PageForm,
  PageTrash,
  PageDraft,
  AllPage,
  Posts,
  AllPost,
  DraftPost,
  PostTrash,
  PostForm,
  Category,
  General,
  Update,
  Tag
} from '@/route-components'
Vue.use(VueRouter)

const routes = [
  ...customRoutes,
  {
    path: '/',
    component: Dashboard,
    meta: {menu: true}
  },
  {
    path: '/login',
    component: Auth,
    meta: {menu: false}
  },
  {
    path: '/users',
    component: Users,
    name: 'Users'
  },
  {
    path: '/users/create',
    component: UserForm,
    name: 'UserForm'
  },
  {
    path: '/users/:id/edit',
    component: UserForm,
    meta: {mode: 'edit'}
  },
  {
    path: '/pages',
    component: Pages,
    name: 'Pages'
  },
  {
    path: '/pages/trashed',
    component: PageTrash
  },
  {
    path: '/pages/draft',
    component: PageDraft
  },
  {
    path: '/pages/all',
    component: AllPage
  },
  {
    path: '/pages/create',
    component: PageForm,
  },
  {
    path: '/pages/:id/edit',
    component:PageForm,
    meta: {mode: 'edit'}
  },
  {
    path: '/posts',
    component: Posts,
    name: 'Posts'
  },
  {
    path: '/posts/all',
    component: AllPost
  },
  {
    path: '/posts/draft',
    component: DraftPost
  },
  {
    path: '/posts/trashed',
    component: PostTrash
  },
  {
    path: '/posts/create',
    component: PostForm
  },
  {
    path: '/posts/:id/edit',
    component: PostForm,
    meta: {mode: 'edit'}
  },
  {
    path: '/category',
    component: Category,
    name: 'Category'
  },
  {
    path: '/setting/general',
    component: General,
    name: 'General'
  },
  {
    path: '/update',
    component: Update,
    name: 'Update'
  },
  {
    path: '/tag',
    component: Tag,
    name: 'Tag'
  }
]

export const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  base: config.ENV.controlPanelBase,
  routes
})
