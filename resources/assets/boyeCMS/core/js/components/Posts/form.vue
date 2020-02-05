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
							<label for="title" class="col-lg-3">Title <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Title"></i></label>
							<div class="col-lg-9">
							  <input type="text" v-model="form.title" class="form-control">
						    </div>
						  </div>
						  <div class="form-group">
						  	<label for="title" class="col-lg-3">Content <i class="fa fa-info-circle uses-tooltip" data-toggle="tooltip" data-original-title="Title"></i></label>
						  	<div class="col-md-9">
						  		<vue-editor @input="autoSave" v-model="form.content" cols="30" rows="10"></vue-editor>
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
							<a href="javascript:void(0)" v-else class="btn btn-primary btn-sm pull-right" @click="checkBeforeSave">Save</a>
						</div>
					</div>
					<!-- /.box -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Format</h3>
						</div>
					</div>
					<!-- /.box -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Categories</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<multiselect
								v-model="form.category"
								:options="categories"
								track-by="id"
								label="name">	
								</multiselect>
							</div>
						</div>
					</div>
					<!-- /.box -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Tags</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<multiselect
								v-model="form.terms"
								:options="tags"
								track-by="id"
								:multiple="true"
								label="name">
									
								</multiselect>
							</div>
						</div>
					</div>
					<!-- /.box -->
					<div class="box box-primay">
						<div class="box-header">
							<h3>Featured Image</h3>
						</div>
						<div class="box-body">
							<a href="javascript:void(0)"  @click="toggleShow" class="btn btn-success btn-sm"><i class="fa fa-camera"></i> Set featured image</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal component -->
			<modal v-if="showModal" @close="showModal = false" :className="className">
				<div slot="header">
					<button class="close" type="button" data-dismiss="modal" aria-label="close" @click="showModal = false">
	                <span aria-hidden="true">x</span>
	                </button>
					<h4>Featured Image</h4>
					<div class="pull-left tab-modal">
						<a :class="{'active': active1}" @click="toggleFirst" href="javascript:void(0)">Upload Files</a>
						<a :class="{'active': active2}" href="javascript:void(0)" @click="toggleSecond">Media Library</a>
					</div>
				</div>
				<div slot="body">
					<div class="media-frame-content" data-column="9">
						<div class="uploader-inline-content" v-if="mediaUpload">
							<div class="uploader-ui text-center">
								<h2 class="upload-instruction">Drop files anywhere to upload</h2>
								<p class="upload-instruction">or</p>
								<input ref="file" name="file" @change="onFileChange" id="file-upload" type="file" style="display: none;">
								<a href="javascript:void(0)" onclick="document.getElementById('file-upload').click()" class="btn btn-default">
									<i class="fa fa-camera"></i> Select Files
								</a>
							</div>
							<div class="post-upload-ui text-center">
								<p class="max-upload-size">Maximum upload file size: 2 MB.</p>
							</div>
						</div>
						<div class="attachment-browser" v-else>
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Search">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-md-3" v-show="isUploading">
									<a href="javascript:void(0)" style="height: 180px; width: 171px; " class="thumbnail text-center">
										<div class="progress pr-uploading">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" :style="{width : uploadPercentage + '%'}">
                                            {{ uploadPercentage }}
                                          </div>
                                         </div>
									</a>
								</div>
								<div class="col-xs-6 col-md-3" v-for="img in allImage" @click="form.img = img">
									<a href="javascript:void(0)" class="thumbnail">
										<img :src="img.mimes.small" class="img img-responsive" alt="">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div slot="footer">
					<button class="btn btn-sm btn-primary pull-right"><i class="fa fa-camera"></i> Set featured image</button>
				</div>
			</modal>
	</section>
</template>

<script>
	import Form from './form.js'
	export default Form
</script>
