new Vue({
        el: '#app' ,
        data(){
            return{
                hide:false,
                dialog:false,
                dialog2:false,
                dialog3:true,
                credit:1000,
                price:0,
                betAmount:10,
                spinNumber:0,
                spining:false,
                luckyDraw:[],
                links: ['Home', 'About Us', 'Team', 'Services', 'Contact Us'],
                menus:[
                    {text:'Home',link:'http://localhost/bakou-raffle/index.php/Raffle/'},
                    {text:'Online Casino',link:'http://localhost/bakou-raffle/index.php/Raffle/OnlineCasino'},
                    {text:'Online Sport',link:'#'},
                    {text:'Online Lottery',link:'#'},
                    {text:'Online Raffle',link:'#'},
                    {text:'Promotion',link:'#'},
                    {text:'Raffle Result',link:'#'},
                ],
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