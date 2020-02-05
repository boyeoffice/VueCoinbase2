<template>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Title</th>
									<th>Description</th>
									<th>Version</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="data in update">
									<td>{{ data.title}}</td>
									<td> 
										<div v-for="d in data.details">
										   {{ d }}
									    </div>
								   </td>
								   <td>{{ data.version }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	import { mapGetters } from 'vuex'
	export default {
		computed: 
		mapGetters(['update'])
	}
</script>