<template>
		<div class="rslides">
			 <transition-group name="slide" class="text-slide" tag="div">
			<div v-for="number in [currentNumber]" class="callback" :key="number">
			<h4 v-on:mouseover="stopRotation" v-on:mouseout="startRotation" >{{ currentText }}</h4>
			</div>
		</transition-group>
		<a href="#" class="callbacks_nav prev"><span class="fa fa-angle-left"></span></a>
		<a href="#" class="callbacks_nav next"><span class="fa fa-angle-right"></span></a>
		</div>
</template>

<script>
	export default {
		data(){
			return{
				text: [
				'The Way To Make Success',
				'The Best Way To Produce'
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
			currentText: function() {
				return this.text[Math.abs(this.currentNumber) % this.text.length]
			}
		}
	}
</script>

<style>
.rslides {
	overflow: hidden;
}
.text-slide {
	overflow: hidden;
	position: relative;
	padding: 6em 0;
}
.text-slide h4 {
	top: 0;
	right: 0;
	left: 0;
	bottom: 0;
	padding: 0;
	margin: 0;
	font-family: 'Markazi Text', serif;
	color: #fff;
	font-size: 2em;
}
.slide-leave-active,
.slide-enter-active {
  transition: 1s;
}
.slide-enter {
  transform: translate(100%, 0);
  position: absolute;
}
.slide-leave-to {
  transform: translate(-100%, 0);
  position: absolute;
}
.callbacks_nav {
	position: absolute;
	z-index: 3;
	overflow: hidden;
	text-decoration: none;
	font-size: 5em;
	top: 78%;

}
.callbacks_nav.prev {
	left: 0;
	padding-left: 0.5em;
}
.callbacks_nav.next {
	right: 0;
	padding-right: 0.5em;
}
.banner-grid1 {
	transition: 1s all;
}
</style>