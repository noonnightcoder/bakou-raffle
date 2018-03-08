<v-carousel style="height: 300px; margin-top: -35px;">
    <v-carousel-item v-for="(item,i) in items" :src="item.src" :key="i"></v-carousel-item>
</v-carousel>
