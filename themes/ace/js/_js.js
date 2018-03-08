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
                current:'',
                links: ['Home', 'About Us', 'Team', 'Services', 'Contact Us'],
                menus:[
                    {text:'Online Casino',link:'http://localhost/bakou-raffle/index.php/Raffle/OnlineCasino'},
                    {text:'Online Sport',link:'#'},
                    {text:'Online Lottery',link:'#'},
                    {text:'Online Raffle',link:'#'},
                    {text:'Promotion',link:'#'},
                    {text:'Raffle Result',link:'#'},
                ],
                fmenus:[
                    {text:'หน้าหลัก',link:'http://www.winwin97.com/'},
                    {text:'คาสิโนออนไลน์',link:'http://www.winwin97.com/casino/'},
                    {text:'สปอร์ตออนไลน์',link:'http://www.winwin97.com/sport/'},
                    {text:'หวยออนไลน์',link:'http://www.winwin97.com/lotto/'},
                    {text:'สมัครสมาชิก',link:'http://www.winwin97.com/register/'},
                    {text:'โปรโมชั่น',link:'http://www.winwin97.com/promotion/'},
                    {text:'แจ้งฝาก – แจ้งถอน',link:'http://www.winwin97.com/banking/'},
                    {text:'LIVE SCORE',link:'http://www.winwin97.com/live-score/'},
                    {text:'ติดต่อเรา',link:'http://www.winwin97.com/contact/'},
                ],
                items: [
                    { src: 'http://www.winwin97.com/wp-content/uploads/2017/03/slide02.jpg' },
                    { src: 'http://www.winwin97.com/wp-content/uploads/2017/03/slide03.jpg?v=1.0' },
                    { src: 'http://www.winwin97.com/wp-content/uploads/2017/03/slide04.jpg?v=1.0' }
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