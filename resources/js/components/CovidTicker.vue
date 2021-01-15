<template>
	<div class="ticker-wrap">
		<div class="ticker">
			<div class="ticker__item"><v-icon large class="yellow--text">fas fa-exclamation-triangle</v-icon></div>
			<div class="ticker__item">Covid information and updates will be posted here.</div>
			<div class="ticker__item"><v-icon large class="light-blue--text">fas fa-exclamation-circle</v-icon></div>
			<div class="ticker__item">Approximately 1 in 3 people who have coronavirus have no symptoms and could be spreading it without realising it.</div>
			<div class="ticker__item"><v-icon large class="light-blue--text">fas fa-exclamation-circle</v-icon></div>
			<div class="ticker__item">Remember - ‘Hands. Face. Space.’</div>
			<div class="ticker__item"><v-icon large class="yellow--text">fas fa-exclamation-triangle</v-icon></div>
		</div>
	</div>
</template>
<style lang="scss" scoped>
* {
	box-sizing: border-box;
}
$duration: 25s;

@-webkit-keyframes ticker {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		visibility: visible;
	}

	100% {
		-webkit-transform: translate3d(-100%, 0, 0);
		transform: translate3d(-100%, 0, 0);
	}
}

@keyframes ticker {
	0% {
		-webkit-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		visibility: visible;
	}

	100% {
		-webkit-transform: translate3d(-100%, 0, 0);
		transform: translate3d(-100%, 0, 0);
	}
}

.ticker-wrap {
	// position: fixed;
	bottom: 0;
	width: 100%;
	overflow: hidden;
	height: 4rem;
	background-color: rgba(#000, 0.9);
	padding-left: 100%;
	box-sizing: content-box;

	.ticker {
		display: inline-block;
		height: 4rem;
		line-height: 4rem;
		white-space: nowrap;
		padding-right: 100%;
		box-sizing: content-box;

		-webkit-animation-iteration-count: infinite;
		animation-iteration-count: infinite;
		-webkit-animation-timing-function: linear;
		animation-timing-function: linear;
		-webkit-animation-name: ticker;
		animation-name: ticker;
		-webkit-animation-duration: $duration;
		animation-duration: $duration;

		&__item {
			display: inline-block;

			padding: 0 2rem;
			font-size: 2rem;
			color: white;
		}
	}
}

body {
	padding-bottom: 5rem;
}
h1,
h2,
p {
	padding: 0 5%;
}
</style>
