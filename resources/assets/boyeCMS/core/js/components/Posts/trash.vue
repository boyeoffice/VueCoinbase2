<template lang="html">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<box-table :source="source" :title="title" :thead="thead" :params="params" :links="links">
					<template slot-scope="props">
						<tr>
							<td>{{ props.item.title }}</td>
							<td>{{ props.item.user.name }}</td>
							<td></td>
							<td></td>
							<td>{{ props.item.created_at | moment("Do MMMM YYYY") }}</td>
							<td>
								<a href="javascript:void(0)" class="btn btn-sm btn-danger" @click="confirm(pageId = props.item.id)"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</template>
				</box-table>
			</div>
		</div>

		<!-- Modal -->
		<modal v-if="showModal">
			<div slot="body">
				<form>
					<div class="form-group text-center">
						<label for="">Are you sure?</label>
						<br/>
						<a href="javascript:void(0)" class="btn btn-default btn-sm" @click="showModal = false">Cancel</a>
						<a href="javascript:void(0)" class="btn btn-danger btn-sm" @click="deletePage">Delete</a>
					</div>
				</form>
			</div>
		</modal>
	</section>
</template>

<script>
	import BoxTable from '~/lib/BoxTable.vue'
	export default {
		components: { BoxTable },
		data(){
			return{
				showModal: false,
				links: [
				{label: 'All', className: 'btn btn-default btn-sm', link: '/posts/all'},
				{label: 'Published', className: 'btn btn-primary btn-sm', link: '/posts'},
				{label: 'Draft', className: 'btn btn-warning btn-sm', link: '/posts/draft'},
				{label: 'Trashed', className: 'btn btn-danger btn-sm', link: '/posts/trashed'},
				{label: 'Create', className: 'btn btn-success btn-sm', link: '/posts/create'}
				],
				source: '/adcom-json/posts',
				title: 'Trashed',
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
                    status: 3,
                    status_2: '',
                    per_page: 10,
                    page: 1,
                    search_column: 'username',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
				},
				display: '',
				pageId: ''
			}
		},
		mounted: function(){
			
		},
		methods: {
			editUser: function(id){
				this.$router.push('/posts/' + id + '/edit')
			},
			confirm(){
				this.showModal = true
			},
			deletePage(){
				axios.delete('/adcom-json/posts/' + this.pageId).then(res => {
					this.showModal = false
				})
			}
		}
	}
</script>