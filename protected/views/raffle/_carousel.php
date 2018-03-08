<v-carousel>
    <v-carousel-item v-for="(item,i) in items" :src="item.src" :key="i" style="height: 100%;">
    </v-carousel-item>
</v-carousel>

<style type="text/css">
	.jumbotron ~ img{
		height: 100% !important;
		min-width: auto;
	}
</style>