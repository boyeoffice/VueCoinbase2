<template lang="html">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<box-table :links="links" :params="params" :source="source" :title="title" :thead="thead">
					<template slot-scope="props">
						<tr>
							<td>{{ props.item.title }}</td>
							<td>{{ props.item.user.name }}</td>
							<td></td>
							<td>
								
							</td>
							<td>{{ props.item.date | moment("d/m/Y") }}</td>
							<td>
								<a href="javascript:void(0)" v-on:click="reStore(id = props.item.id)" class="btn btn-sm btn-default"><i class="fa fa-reply-all"></i></a>
								<button class="btn btn-sm btn-danger" @click="confirm(pageId = props.item.id)"><i class="fa fa-trash"></i> Delete</button>
							</td>
						</tr>
					</template>
				</box-table>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal" :style="{display: display}">
			<div class="modal-dialog  modal-sm">
				<div class="modal-content">
					<div class="modal-body">
						<form>
							<div class="form-group text-center">
								<label for="">Are you sure?</label>
								<br/>
								<a href="javascript:void(0)" class="btn btn-default btn-sm" @click="Cancel">Cancel</a>
								<a href="javascript:void(0)" class="btn btn-danger btn-sm" @click="deletePage">Delete</a>
							</div>
						</form>
					</div>
				</div>
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
				{label: 'All', className: 'btn btn-default btn-sm', link : '/pages/all'},
				{label: 'Published', className: 'btn btn-primary btn-sm', link : '/pages'},
				{label: 'Draft', className: 'btn btn-warning btn-sm', link : '/pages/draft'},
				{label: 'Trash', className: 'btn btn-danger btn-sm', link : '/pages/trashed'},
				{label: 'Create', className: 'btn btn-success btn-sm', link : '/pages/create'}
				],
				source: '/adcom-json/pages',
				title: 'Trashed',
				pageId: '',
				display: '',
				thead: [
				{label: 'Title'},
				{label: 'Author'},
				{label: 'Categories'},
				{label: 'Tags'},
				{label: 'Date'},
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
				   }
			}
		},
		methods: {
			reStore(id){
				var data = { status: 2 }
				axios.put('/adcom-json/pages/update/' + id, data).then(res => {
					this.$router.push('/pages/draft')
				})
			},
			confirm(){
				this.display = 'block'
			},
			Cancel(){
				this.display = ''
			},
			deletePage(){
				axios.delete(this.source + '/' + this.pageId).then(res => {
					this.$router.push('/pages')
				})
			},
		}
	}
</script>