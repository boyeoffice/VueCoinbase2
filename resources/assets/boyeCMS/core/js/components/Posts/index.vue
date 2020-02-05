<template lang="html">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<box-table :source="source" :title="title" :thead="thead" :params="params" :links="links">
					<template slot-scope="props">
						<tr>
							<td>{{ props.item.title }}</td>
							<td>{{ props.item.user.name }}</td>
							<td>{{ props.item.category.name }}</td>
							<td> <span class="label label-default" for="" v-for="tag in props.item.terms">{{ tag.name }}  </span></td>
							<td>{{ props.item.created_at | moment("Do MMMM YYYY") }}</td>
							<td>
								<a href="javascript:void(0)" v-on:click="editUser(id = props.item.id)" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
					</template>
				</box-table>
			</div>
		</div>
	</section>
</template>

<script>
	import BoxTable from '~/lib/BoxTable.vue'
	export default {
		components: { BoxTable },
		data(){
			return{
				links: [
				{label: 'All', className: 'btn btn-default btn-sm', link: '/posts/all'},
				{label: 'Published', className: 'btn btn-primary btn-sm', link: '/posts'},
				{label: 'Draft', className: 'btn btn-warning btn-sm', link: '/posts/draft'},
				{label: 'Trashed', className: 'btn btn-danger btn-sm', link: '/posts/trash'},
				{label: 'Create', className: 'btn btn-success btn-sm', link: '/posts/create'}
				],
				source: '/adcom-json/posts',
				title: 'Published',
				thead: [
				{label: 'Title'},
				{label: 'Author'},
				{label: 'Categories'},
				{label: 'Tags'},
				{label: 'Created At'},
				{label: 'Action'}
				],
				params: {
				    column: 'id',
                    direction: 'desc',
                    status: 1,
                    status_2: '',
                    per_page: 10,
                    page: 1,
                    search_column: 'username',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
				}
			}
		},
		mounted: function(){
			
		},
		methods: {
			editUser: function(id){
				this.$router.push('/posts/' + id + '/edit')
			}
		}
	}
</script>