<template lang="html">
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<box-table :source="source" :title="title" :thead="thead" :params="params" :links="links">
					<template slot-scope="props">
						<tr style="cursor: pointer;" v-on:click="editUser(id = props.item.id)">
							<td>{{ props.item.name }}</td>
							<td>{{ props.item.email }}</td>
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
				{label: 'Create', className: 'btn btn-success btn-sm', link: '/users/create'}
				],
				source: '/adcom-json/users',
				title: 'Users',
				thead: [
				{label: 'Name'},
				{label: 'Email'}
				],
				params: {
				    column: 'id',
                    direction: 'desc',
                    status: 'publish',
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
				this.$router.push('/users/' + id + '/edit')
			}
		}
	}
</script>