<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<div id="app">
  <v-app id="aspire" style="background-image:url('<?=baseurl().'/images/'?>bd_bg.png') !important;background-repeat:repeat !important;">
	<v-layout justify-center align-center>
      <v-content>
        <v-container  style="width:1000px;">
			<div>
				<img src="<?=baseurl().'/images/'?>head-winwin97.jpg">
			</div>
			<v-layout  style="width:1000px;">
				<!--left sidebar-->
				<v-flex xs12 sm3 md3>
					<v-container fluid style="min-height: 0;" grid-list-lg>	
						<v-toolbar color="blue-grey darken-4">
							<v-toolbar-title class="white--text">
								Remaining Credit
							</v-toolbar-title>
						</v-toolbar>
						<v-flex xs12>
							<v-card color="blue-grey darken-2" class="white--text">
								<v-flex xs12 sm12 md12 class="headline text-lg-center">
									{{credit}} <span style="color:red;font-weight:bold;" v-html="betAmount>credit?'Out Of Credit':''"></span>
								</v-flex>
								
							</v-card>
						</v-flex>
						<v-layout row wrap>
							<v-flex xs12>
								<v-card color="blue-grey darken-2" class="white--text">
									<v-toolbar color="blue-grey darken-4">
										<v-toolbar-title class="white--text">
											Ratha
										</v-toolbar-title>
									</v-toolbar>
									<v-flex xs12 sm12 md12>
										<div>
											Phone: 012 234 678
										</div>
										<div>
											Welcome To WinWin97
										</div>
									</v-flex>
								</v-card>
							</v-flex>
						</v-layout>
						<div>
							<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
						</div>
					</v-container>
				</v-flex>
				<v-flex xs12 sm5 md5>
					<v-container fluid style="min-height: 0;" grid-list-lg>
						<v-toolbar color="blue-grey darken-4">
							<v-toolbar-title class="white--text">
								Lotter Lucky Draw
							</v-toolbar-title>
						</v-toolbar>
						<v-flex xs12 sm12 md12>
							<v-card color="blue-grey darken-2" class="white--text text-lg-center">
								<h1>{{spinNumber}}</h1>
							</v-card>
						</v-flex>
						<div class="devider"></div>
						<v-flex xs12 sm12 md12>
							<v-card color="blue-grey darken-2" class="white--text text-lg-center">
								<v-flex>
									Choose Your Lucky Price
								</v-flex>
								<v-btn class="white--text" v-for="(amt,i) in luckyAmt" color="blue-grey darken-3" 
								@click="insertLuckyNumber(amt)" 
								:disabled="betAmount<=credit & credit>0?false:true">
									{{amt}}
								</v-btn>
							</v-card>
						</v-flex>
						<div>
							<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
						</div>
					</v-container>
				</v-flex>	
				<v-flex xs12 sm4 md4>
					<v-container fluid style="min-height: 0;" grid-list-lg>
						<v-toolbar color="blue-grey darken-4">
							<v-toolbar-title class="white--text">
								Lotter Lucky List
							</v-toolbar-title>
						</v-toolbar>
						<v-layout row wrap>
							
							<v-flex xs12>
								<v-card color="blue-grey darken-2" class="white--text">
								<v-layout row wrap v-if="luckyDraw.length>0">
									<v-flex xs12 sm6 md6 class="headline text-lg-center">
										Lucky Draw
									</v-flex>
									<v-flex xs12 sm6 md6 class="headline text-lg-center">
										Price(B)
									</v-flex>
								</v-layout>
								<v-layout row wrap v-else>
									<v-flex xs12 sm12 md12 class="headline text-lg-center">
										No Entry
									</v-flex>
								</v-layout>
								</v-card>
							</v-flex >
							<v-flex xs12 v-for="(ld,index) in luckyDraw" :key="index">
								<v-card color="blue-grey darken-2" class="white--text">
									<v-flex xs12 sm12 md12 class="headline">
										<v-layout row wrap>
											<v-flex class="text-lg-center">
												{{ld.luckyNum}}
											</v-flex>
											<v-flex class="text-lg-center">
												{{ld.price}}
											</v-flex>
										</v-layout>
									</v-flex >
								</v-card>
							</v-flex>
						</v-layout>
						<div>
							<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
						</div>
						<div>
							<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
						</div>
					</v-container>
				</v-flex>
			</v-layout>
		</v-container>
      </v-content>
	  </v-layout>
	  <v-footer height="auto" class="grey darken-3">
      <v-layout row wrap justify-center>
        <v-btn
          color="white"
          flat
          v-for="link in links"
          :key="link"
        >
          {{ link }}
        </v-btn>
        <v-flex xs12 py-3 text-xs-center white--text>
          &copy;2018 — <strong>WinWin97.com</strong>
        </v-flex>
      </v-layout>
    </v-footer>
	  </v-app>
  </div>
  <!--Vuejs and Vuetify javascript-->
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>

  <script>
    new Vue({ 
		el: '#app' ,
		data(){
			return{
				credit:1000,
				price:0,
				betAmount:0,
				spinNumber:0,
				spining:false,
				luckyDraw:[],
				links: ['Home', 'About Us', 'Team', 'Services', 'Blog', 'Contact Us'],
				luckyAmt:[
					100,300,400,500,700,1000
				]
			}
		},
		created(){
			this.Spin()
		},
		watch:{
			price:function(){
				if(this.price>0){
					this.betAmount=this.price
				}
			}
		},
		methods:{
			Spin:function(){
				var vm=this
				vm.spining=!vm.spining
				var spiningRun=setInterval(function(){
					if(vm.spining==true){
						vm.spinNumber=Math.random().toString().slice(2,6)
					}else{
						clearInterval(spiningRun)
					}
				},200);
			},
			bet(){
				if(parseInt(this.betAmount)>0 & parseInt(this.betAmount)<=parseInt(this.credit)){
					this.credit=parseInt(this.credit)-parseInt(this.betAmount)
					this.betAmount=this.price
					this.price=0
				}else{
					this.credit=parseInt(this.credit)
				}
			},
			insertLuckyNumber(amt){
				
				if(this.credit>0){
					this.credit=parseInt(this.credit)-parseInt(amt)
					this.luckyDraw.push({price:amt,luckyNum:this.spinNumber})
				}else{
					
				}
			}
		}
	})
  </script>

