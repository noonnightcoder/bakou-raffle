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
                    {text:'Online Sport',link:'http://localhost/bakou-raffle/index.php/Raffle/OnlineSport'},
                    {text:'Online Lottery',link:'http://localhost/bakou-raffle/index.php/Raffle/OnlineLottery'},
                    {text:'Online Raffle',link:'#'},
                    {text:'Promotion',link:'http://localhost/bakou-raffle/index.php/Raffle/Promotion/'},
                    {text:'Raffle Result',link:'#'},
                ],
                /*fmenuGroups:[
                    {
                        group:'CASINO ONLINE',id:'menu-casino-online',class:'nav',items:[
                            {
                                text:'G Club',
                                id:'menu-item-422',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-422',
                                link:'http://www.winwin97.com/g-club/'
                            },
                            {
                                text:'Genting Crown',
                                id:'menu-item-423',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-423',
                                link:'http://www.winwin97.com/genting-crown/'
                            },
                            {
                                text:'GREEN DRAGON',
                                id:'menu-item-425',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-425',
                                link:'http://www.winwin97.com/green-dragon/'
                            },
                            {
                                text:'Holiday Palace',
                                id:'menu-item-426',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-426',
                                link:'http://www.winwin97.com/holiday-palace/'
                            },
                            {
                                text:'Red Dragon',
                                id:'menu-item-427',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-427',
                                link:'http://www.winwin97.com/red-dragon/'
                            },
                            {
                                text:'855 CROWN',
                                id:'menu-item-436',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-436',
                                link:'http://www.winwin97.com/855-crown/'
                            },
                            {
                                text:'GOLDEN SLOT',
                                id:'menu-item-424',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-424',
                                link:'http://www.winwin97.com/golden-slot/'
                            },
                            {
                                text:'Royal Ruby',
                                id:'menu-item-437',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-437',
                                link:'http://www.winwin97.com/royal-ruby/'
                            },
                            {
                                text:'SAVAN VEGAS',
                                id:'menu-item-428',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-428',
                                link:'http://www.winwin97.com/savan-vegas/'
                            },
                        ]
                    },
                    {
                        group:'SPORT ONLINE',id:'menu-sport-online',class:'nav',items:[
                            {
                                text:'SBOBET',
                                id:'menu-item-440',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-440',
                                link:'http://www.winwin97.com/sbobet/'
                            },
                            {
                                text:'IBCBET',
                                id:'menu-item-439',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-439',
                                link:'http://www.winwin97.com/ibcbet/'
                            },
                            {
                                text:'855BET',
                                id:'menu-item-438',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-438',
                                link:'http://www.winwin97.com/855bet/'
                            },
                            {
                                text:'AFB88',
                                id:'menu-item-442',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-442',
                                link:'http://www.winwin97.com/afb88/'
                            },
                            {
                                text:'M8BET',
                                id:'menu-item-444',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-444',
                                link:'http://www.winwin97.com/m8bet/'
                            },
                            {
                                text:'WINNING FT',
                                id:'menu-item-441',
                                class:'menu-item menu-item-type-post_type menu-item-object-post menu-item-441',
                                link:'http://www.winwin97.com/winning-ft/'
                            },
                        ]
                    }
                ],*/
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
                lotteries:[
                    {
                        date:'2018-03-19',priceNo:[
                            {
                                text:'1st',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'2nd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'3rd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'4th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'5th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            }
                        ]
                    },
                    {
                        date:'2018-03-18',priceNo:[
                            {
                                text:'1st',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'2nd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'3rd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'4th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'5th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            }
                        ]
                    },
                    {
                        date:'2018-03-17',priceNo:[
                            {
                                text:'1st',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'2nd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'3rd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'4th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'5th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            }
                        ]
                    },
                    {
                        date:'2018-03-16',priceNo:[
                            {
                                text:'1st',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'2nd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'3rd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'4th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'5th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            }
                        ]
                    },
                    {
                        date:'2018-03-15',priceNo:[
                            {
                                text:'1st',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'2nd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'3rd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'4th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'5th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            }
                        ]
                    },
                    {
                        date:'2018-03-14',priceNo:[
                            {
                                text:'1st',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'2nd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'3rd',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'4th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            },
                            {
                                text:'5th',result:['xxx','xxx','xxxx','xxxx','xxx']
                            }
                        ]
                    }
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