<template>
	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{{ title }}</h3>
					</div>
					<div class="box-body">
						<form @submit.prevent="save">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" v-model="form.name">
							</div>
							<div class="form-group">
								<label for="parent">Slug</label>
								<input type="text" style="text-transform: lowercase;" disabled class="form-control" v-model="updateSlug">
							</div>
							<div class="form-group">
								<label for="desc">Description</label>
								<textarea v-model="form.description" class="form-control" rows="3"></textarea>
							</div>
							<button class="btn btn-sm btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="box box-primary">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Slug</th>
								<th>Count</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(data, index) in model">
								<td>{{ data.name }}</td>
								<td>{{ data.description }}</td>
								<td>{{ data.slug }}</td>
								<td>{{ data.count }}</td>
								<td>
									<a href="#" class="btn btn-sm btn-primary" @click="edit(data)">
										<i class="fa fa-edit"></i>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</template>

<script>

	export default{
	data(){
			return{
				title: 'Add new tag',
				form: {
					name: '',
					slug: '',
					description: ''
				},
				isSaving: false,
				errors: {},
				source: '/adcom-json/tag',
				model: []
			}
		},
		beforeMount(){
			this.fetchData()
		},
		methods: {
			save(){
				this.isSaving = true 
				axios.post(this.source, this.form).then(res => {
					this.isSaving = false
					this.form = {}
					this.fetchData()
				}).catch(e => {
					this.errors = e.response.data
				})
			},
			fetchData(){
				Nprogress.start()
				axios.get(this.source).then(res => {
					this.model = res.data
					Nprogress.done()
				})
			},
			edit(data){
				this.title = 'Edit tag'
				this.form = data
			}
		},
		computed: {
			updateSlug(){
				return this.form.slug = this.form.name
			}
		}
	}
</script>