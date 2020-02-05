import Select2 from '~/lib/Select2'
import Multiselect from 'vue-multiselect'
import Datepicker from 'vuejs-datepicker'
import { VueEditor } from 'vue2-editor'
	
	export default {
		components: { Select2, Datepicker, Multiselect, VueEditor},
		data(){
			return{
				mediaUpload: true,
				active1: true,
				active2: false,
				className: 'modal-lg',
				showModal: false,
				title: 'Create form',
				form: {
					content: '',
					status: 1,
					category: {
						id: 1,
						name: 'Uncategories'
					}
				},
				initialize: '/adcom-json',
				store: '/adcom-json/posts',
				method: 'post',
				errors: {},
				isSaving: false,
				tags: [],
				categories: [],
				image: '',
				allImage: [],
				isUploading: false,
				uploadPercentage: 0
				
			}
		},
		beforeMount(){
			if(this.$route.meta.mode === 'edit'){
				this.store = '/adcom-json/posts/' + this.$route.params.id
				this.initialize = '/adcom-json/posts/' + this.$route.params.id + '/edit'
				this.method = 'put'
				this.fetchData()
			}
			this.fetchCategory()
		},
		methods: {
			fetchImages(){
				axios.get('/adcom-json/images').then(res => {
					this.allImage = res.data
				})
			},
			onFileChange(){
            this.image = this.$refs.file.files[0]
            this.createImage()
          },
          createImage(){
          	let formData = new FormData()
          	formData.append('file', this.image)
          	this.formData = formData
            this.toggleSecond()
            this.isUploading = true
            this.uploadImage(formData)
          },
          uploadImage: _.debounce(function(formData, headers){
          	axios.post('/adcom-json/upload-image', 
          		formData,
          		{
          			headers: {
          				'Content-Type': 'multipart/form-data', 'X-Requested-With': 'XMLHttpRequest'
          			},
          			onUploadPercentage: function(progressEvent) {
          		      this.uploadPercentage = parseInt( Math.random((progressEvent.loaded * 100) / progressEvent.total));
          		   }.bind(this)
          		}
          		 ).then(res => {
          		this.isUploading = false
          		this.fetchImages()
          	})
          }, 1000),
			toggleFirst(){
				this.mediaUpload = true
				this.active1 = true
				this.active2 = false
			},
			toggleSecond(){
				this.mediaUpload = false
				this.active1 = false
				this.active2 = true
				this.fetchImages()
			},
			toggleShow(){
				this.showModal = true
				this.fetchImages()
				this.toggleSecond()
			},
			fetchData(){
				axios.get(this.initialize).then(res => {
					this.form = res.data
				})
			},
			checkBeforeSave(){
				 this.form.category_id = this.form.category.id
				 if(this.form.terms) {
					var tags = []
					this.form.terms.forEach((tag) => {
						tags.push(tag.id)
					})
					this.form.tags = tags
				  }
				  this.save()
			},
			save(){
				this.isSaving = true
				axios[this.method](this.store, this.form).then(res => {
					this.$router.push('/posts')
				}).catch(e => {
					this.isSaving = false
				})
			},
			toTrash(){
				var data = { status: 3 }
				axios.put('/adcom-json/posts/update/' + this.form.id, data).then(res => {
					this.$router.push('/posts/trashed')
				})
			},
			fetchTag(){
				axios.get('/adcom-json/tag').then(res => {
					this.tags = res.data
				})
			},
			fetchCategory(){
				axios.get('/adcom-json/category').then(res => {
					this.categories = res.data
					this.fetchTag()
				})
			},
			autoSave: _.debounce(function() {
		      this.checkBeforeSubmit()
		    }, 1000),
				/*setTimeout(() => {
					this.checkBeforeSubmit()
				}, 1000)*/
			
			saveNow(){
				if(this.$route.meta.mode === 'edit'){
					axios[this.method](this.store, this.form).then(res => {

					})
				}else{
					axios[this.method](this.store, this.form).then(res => {
						this.form.id = res.data
						this.$router.push('/posts/' + res.data + '/edit')
						this.store = '/adcom-json/posts/' + res.data
						this.method = 'put'
					})
				}
			},
			checkBeforeSubmit(){
				this.form.category_id = this.form.category.id 
				this.form.status = 2
				if(this.form.terms) {
					var tags = []
					this.form.terms.forEach((tag) => {
						tags.push(tag.id)
					})
					this.form.tags = tags
				}
				this.saveNow()
			}
		}
	}