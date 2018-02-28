<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<div id="app">
	<v-app id="aspire" xs12 style="background-image:url('<?=baseurl().'/images/'?>bd_bg.png') !important;background-repeat:repeat !important; ">
		<v-content>
      		<v-container fluid>
        		<v-layout justify-center>
          			<v-flex xs12 sm9 md9>
            			<v-card class="elevation-12"  color="blue-grey darken-4">
            				<v-flex xs12 sm12 md12>
								<img src="<?=baseurl().'/images/'?>head-winwin97.jpg" width="100%">
							</v-flex>
							
							<v-flex xs12 sm12 md12  flat height="200px" tile>
						      <v-toolbar justify-center dense color="blue-grey darken-4">
						      	<v-toolbar-title class="white--text">ยินดีต้อนรับที่มาเล่นใน WinWin97 Lucky Draw</v-toolbar-title>
						        <v-spacer></v-spacer>
						        <v-btn color="success">โปรไฟล์</v-btn>
						      	<v-btn color="warning">เครดิต</v-btn>
						      	<v-btn color="info" @click="dialog2=true">ใส่เงิน</v-btn>
						      </v-toolbar>
						    </v-flex>
						    <v-divider></v-divider>
						    <v-container>
	            				<v-layout row wrap>
		            				<v-flex xs12 sm3 md3>
		            					<v-card color="grey lighten-4" flat  tile>
			            					<v-toolbar class="text-lg-center" dense color="blue-grey darken-2">
			            						<v-toolbar-title class="white--text">เครดิตของคุณ</v-toolbar-title>
			            					</v-toolbar>
			            					<v-divider></v-divider>
			            					<h3 style="font-size: 40px; text-align: center;">
			            						{{credit}} บาท
			            					</h3>
			            					<v-container>
												<v-text-field :label="'Input Amount'" type="number" v-model="price" @keyup="betAmount>0 & betAmount<=credit & credit>0?dialog=false:dialog=true" class="white--text"/>
											</v-container>
											<div class="text-lg-right">
												<v-btn xs12 sm12 md12 class="white--text" color="blue-grey darken-3" 
													@click="insertLuckyNumber" 
													:disabled="betAmount>0 & betAmount<=credit & credit>0?false:true">
														Lucky Draw
												</v-btn>
											</div>
											
			            				</v-card>
			            				<v-card color="grey lighten-4" flat  tile>
			            					<v-toolbar class="text-lg-center" dense color="blue-grey darken-2">
			            						<v-toolbar-title class="white--text">ของบริษัท</v-toolbar-title>
			            					</v-toolbar>
			            					<v-divider></v-divider>
			            					<v-container>
				            					<p>
				            						<b>DTAC:</b> 091-996-9183-6
				            					</p>
				            					<p>
				            						<b>AIS:</b> 092 616-6912-5
				            					</p>
			            					</v-container>
			            				</v-card>
			            				<div>
												<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
											</div>
											<div>
												<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
											</div>
		            				</v-flex>
		            				<v-flex xs12 sm6 md6>
		            					<v-layout align-center row wrap justify-center>
		            						<v-flex xs12 sm10 md10>
			            						<v-card>
			            							<h1 style="font-size: 100px; text-align: center;">{{spinNumber}}</h1>
			            						</v-card>
			            					</v-flex>
			            					<v-flex xs12 sm10 md10>
			            						<p></p>
			            						<p class="white--text">
			            							ซื่อมากจะมีโอการชนะมากด้วย พนันมากชนะมาก ขอให้โชคดีและชนะกับ วินวิน๙๗นะ ขอบคุณมาก
			            						</p>
			            						<p  class="white--text">
			            							Buy the lucky draw number to have chance to win BIG PRIZE. The more you BET the more you win. Wish you good luck and win with WinWin97 Lucky Draw. THANK YOU!
			            						</p>
			            					</v-flex>
			            					<v-flex xs12 sm10 md10>
												<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
											</v-flex>
			            				</v-layout>
		            				</v-flex>
		            				<v-flex xs12 sm3 md3>
		            					<v-card color="grey lighten-4" flat  tile>
			            					<v-toolbar class="text-lg-center" dense color="blue-grey darken-2">
			            						<v-toolbar-title class="white--text">บัญชีของคุณ</v-toolbar-title>
			            					</v-toolbar>
			            					<v-divider></v-divider>
			            					<v-list v-if="luckyDraw.length>0">
			            						<v-list-tile v-for="(ld,index) in luckyDraw" :key="index">
				            						<v-list-tile-content>
									                	<v-list-tile-title v-text="ld.luckyNum"></v-list-tile-title>
									              	</v-list-tile-content>
						                				{{ld.price}} บาท
				            					</v-list-tile>
			            					</v-list>
			            					<h1 v-else style="text-align: center;">
			            						ยังไม่มีบัญชี
			            					</h1>
			            					<div>
												<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
											</div>
											<div>
												<img src="<?=baseurl().'/images/'?>gif1.gif" width="100%">
											</div>
			            				</v-card>
		            				</v-flex>
		            			</v-layout>
		            		</v-container>
            			</v-card>
            		</v-flex>
            	</v-layout>
            </v-container>
        </v-content>
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

	<!--Dialog-->
		<v-layout row justify-center>
	      <v-dialog v-model="dialog" persistent max-width="400">
	        <v-card>
	          <v-toolbar justify-center dense color="blue-grey darken-4">
		      	<v-toolbar-title class="white--text">Message</v-toolbar-title>
		      </v-toolbar>
		      <v-card-title class="headline">You don't have enough credit!!!</v-card-title>
	          <v-card-text>Please contact us to TOPUP</v-card-text>
	          <v-card-actions>
	            <v-spacer></v-spacer>
	            <v-btn color="green darken-1" flat @click="resetAmount">ปิด</v-btn>
	          </v-card-actions>
	        </v-card>
	      </v-dialog>
	    </v-layout>

	    <v-layout row justify-center>
	      <v-dialog v-model="dialog2" persistent max-width="400">
	        <v-card>
	          <v-toolbar justify-center dense color="blue-grey darken-4">
		      	<v-toolbar-title class="white--text">Message</v-toolbar-title>
		      </v-toolbar>
		      <v-card-title class="headline">Contact Us VIA</v-card-title>
	          <v-card-text>
	          	<strong>
	          		PHONE:  
	          	</strong>
	          	<p>
	          		091-996-9183, 
	          		091-996-9184,
	          		091-996-9185, 
	          		091-996-9186, 
	          		092 616-6912, 
	          		092 616-6913, 
	          		092 616-6914, 
	          		092 616-6915 
	          	</p>
	          </v-card-text>
	          <v-card-actions>
	            <v-spacer></v-spacer>
	            <v-btn color="green darken-1" flat @click.native="dialog2=false">ปิด</v-btn>
	          </v-card-actions>
	        </v-card>
	      </v-dialog>
	    </v-layout>
	<!--End Dialog-->
</div>
  <!--Vuejs and Vuetify javascript-->
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>

  <script>
    new Vue({ 
		el: '#app' ,
		data(){
			return{
				dialog:false,
				dialog2:false,
				credit:1000,
				price:0,
				betAmount:0,
				spinNumber:0,
				spining:false,
				luckyDraw:[],
				links: ['Home', 'About Us', 'Team', 'Services', 'Contact Us']
			}
		},
		created(){
			this.Spin()
		},
		watch:{
			price:function(){
				if(this.price>0){
					this.betAmount=this.price
				}else if(parseInt(this.price)>parseInt(this.credit)){
					this.dialog=true
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
				},100);
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
			insertLuckyNumber(){
				
				if(this.credit>0){
					this.credit=parseInt(this.credit)-parseInt(this.betAmount)
					this.luckyDraw.push({price:this.betAmount,luckyNum:this.spinNumber})
				}else{
					
				}
			},
			resetAmount(){
				this.price=this.credit
				this.dialog=false;
    		}	
		}
	})
  </script>

