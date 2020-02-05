<template>
		<div class="rslides">
			 <transition-group name="fade" tag="div">
			<div v-for="number in [currentNumber]" class="callback" :key="number">
				<img v-bind:src="currentImage" alt="Affilation" v-on:mouseover="stopRotation" width="100%" v-on:mouseout="startRotation" >
			</div>
		</transition-group>
		</div>
</template>

<script>
	export default {
		data(){
			return{
				images: [
				'/img/df.jpg',
				'/img/gtf.jpg',
				'/img/gty.jpg'
				],
				timer: null,
				currentNumber: 0
			}
		},
		mounted: function() {
			this.startRotation()
		},
		methods: {
			startRotation: function() {
				this.timer = setInterval(this.next, 3000)
			},
			stopRotation: function() {
				clearTimeout(this.timer)
				this.timer = null
			},
			next: function() {
				this.currentNumber += 1
			},
			prev: function() {
				this.currentNumber -= 1
			}
		},
		computed: {
			currentImage: function() {
				return this.images[Math.abs(this.currentNumber) % this.images.length]
			}
		}
	}
</script>

<style>
.fade-enter-active, .fade-leave-active {
 transition: all 0.8s ease;
 overflow: hidden;
 visibility: visible;
 opacity: 1;
 position: absolute;
 z-index: 2;
}
.fade-enter, .fade-leave-to {
 opacity: 0;
 visibility: hidden;
}
</style>