<template>
	<section class="content">
			<div class="row">
				<div class="col-md-8">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">{{title}}</h3>
						</div>
						<div class="box-body">
							<form class="form-horizontal">
							<div class="form-group">
							<label for="title" class="col-lg-4">Title <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Title"></i></label>
							<div class="col-lg-8">
							  <input type="text" v-model="form.title" class="form-control">
						    </div>
						  </div>
						  <div class="form-group">
						  	<label for="title" class="col-lg-4">Content <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Title"></i></label>
						  	<div class="col-md-8">
						  		<textarea v-model="form.content" class="form-control" cols="30" rows="10"></textarea>
						  	</div>
						  </div>
						</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Publish</h3>
						</div>
						<div class="box-body">
							<form>
								<div class="form-group">
									<i class="fa fa-map-pin"></i> <span>Status:</span>
									<b v-if="form.status === 1">Published</b>
									<b v-else>Draft</b>
									<div id="post-status" class="row">
									<div class="col-md-12">
										<select2 class="input-xs" v-model="form.status">
										<option value="1">Published</option>
										<option value="2">Draft</option>
									   </select2>
									</div>
								   </div>
								</div>
								<div class="form-group">
									<i class="fa fa-eye"></i> <span>Visibility</span>
									<b>Public</b>
								</div>
								<div class="form-group">
									<i class="fa fa-calendar"></i> <span>Published on:</span>
									<div class="row">
										<div class="col-md-12">
											<datepicker :bootstrapStyling="true" v-model="form.date" :calendarButton="true" calendarButtonIcon="fa fa-calendar" :required="true"></datepicker>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="box-footer">
							<button class="btn btn-sm btn-danger" v-if="$route.meta.mode === 'edit'" @click="toTrash"><i class="fa fa-trash"></i> Trash</button>
							
							 <a href="javascript:void(0)" v-if="isSaving" class="btn btn-primary btn-sm pull-right" style="cursor: none;"><i class="fa fa-spinner fa-spin"></i> Saving</a>
							<a href="javascript:void(0)" v-else class="btn btn-primary btn-sm pull-right" @click="save">Save</a>
						</div>
					</div>
					<!-- /.box -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Page Attributes</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="order">Order</label>
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
					<!-- /.box -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Featured Image</h3>
						</div>
					</div>
					<!-- /.box -->
				</div>
			</div>
	</section>
</template>

<script>
	import Select2 from '~/lib/Select2'
	import Datepicker from 'vuejs-datepicker'
	import Ckeditor from '~/lib/Ckeditor'
	export default {
		components: { Select2, Datepicker, Ckeditor },
		data(){
			return{
				title: 'Create form',
				form: {
					content: '',
					status: 1
				},
				initialize: '/adcom-json',
				store: '/adcom-json/pages',
				method: 'post',
				errors: {},
				isSaving: false,
				display: ''
			}
		},
		mounted(){
			if(this.$route.meta.mode === 'edit'){
				this.store = '/adcom-json/pages/' + this.$route.params.id
				this.initialize = '/adcom-json/pages/' + this.$route.params.id + '/edit'
				this.method = 'put'
				this.fetchData()
			}
		},
		methods: {
			fetchData(){
				axios.get(this.initialize).then(res => {
					this.form = res.data
				})
			},
			save(){
				this.isSaving = true
				axios[this.method](this.store, this.form).then(res => {
					this.toPage()
				}).catch(e => {
					this.isSaving = false
				})
			},
			toTrash(){
				var data = { status: 3 }
				axios.put('/adcom-json/pages/update/' + this.form.id, data).then(res => {
					this.$router.push('/pages/trashed')
				})
			},
			toPage(){
				this.$router.push('/pages')
			}
		}
	}
</script>