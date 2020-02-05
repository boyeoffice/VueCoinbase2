import Vue from 'vue'

export const Dashboard = Vue.component(
  'Dashboard',
  require('_/components/Dashboard/dashboard.vue')
)
export const Auth = Vue.component(
  'Auth',
  require('_/components/Auth/login.vue')
)
export const Users = Vue.component(
	'Users',
	require('_/components/Users/index.vue')
	)
export const UserForm = Vue.component(
	'UserForm',
	require('_/components/Users/form.vue')
	)
export const Pages = Vue.component(
	'Pages',
	require('_/components/Pages/index.vue')
	)
export const PageForm = Vue.component(
	'PageForm',
	require('_/components/Pages/form.vue')
	)
export const PageTrash = Vue.component(
	'PageTrash',
	require('_/components/Pages/trash.vue')
	)
export const PageDraft = Vue.component(
	'PageDraft',
	require('_/components/Pages/draft.vue')
	)
export const AllPage = Vue.component(
	'AllPage',
	require('_/components/Pages/all.vue')
	)
export const Posts = Vue.component(
	'Posts',
	require('_/components/Posts/index.vue')
	)
export const AllPost = Vue.component(
	'AllPost',
	require('_/components/Posts/all.vue')
	)
export const DraftPost = Vue.component(
	'DraftPost',
	require('_/components/Posts/draft.vue')
	)
export const PostTrash = Vue.component(
	'PostTrash',
	require('_/components/Posts/trash.vue')
	)
export const PostForm = Vue.component(
	'PostForm',
	require('_/components/Posts/form.vue')
	)
export const Category = Vue.component(
	'Category',
	require('_/components/Category/index.vue')
	)
export const General = Vue.component(
	'General',
	require('_/components/Setting/general.vue')
	)
export const Update = Vue.component(
	'Update',
	require('_/components/Update/index.vue')
	)
export const Tag = Vue.component(
	'Tag',
	require('_/components/Tag/index.vue')
	)