<div id="randomize">
    <div class="content container" style="text-align: center;max-width: 900px;">
        <h1>Randomize your stuff!</h1>

        <div class="row">
            <div class="col-xs-4">
                <div>
                    <div id="machine1" class="randomizeMachine">
                        <div><img src="img/slot1.png" /></div>
                        <div><img src="img/slot2.png" /></div>
                        <div><img src="img/slot3.png" /></div>
                        <div><img src="img/slot4.png" /></div>
                        <div><img src="img/slot5.png" /></div>
                        <div><img src="img/slot6.png" /></div>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div>
                    <div id="machine2" class="randomizeMachine">
                        <div><img src="img/slot1.png" /></div>
                        <div><img src="img/slot2.png" /></div>
                        <div><img src="img/slot3.png" /></div>
                        <div><img src="img/slot4.png" /></div>
                        <div><img src="img/slot5.png" /></div>
                        <div><img src="img/slot6.png" /></div>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div>
                    <div id="machine3" class="randomizeMachine">
                        <div><img src="img/slot1.png" /></div>
                        <div><img src="img/slot2.png" /></div>
                        <div><img src="img/slot3.png" /></div>
                        <div><img src="img/slot4.png" /></div>
                        <div><img src="img/slot5.png" /></div>
                        <div><img src="img/slot6.png" /></div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="btn-group btn-group-justified btn-group-randomize" role="group">
                <div id="ranomizeButton" type="button" class="btn btn-danger btn-lg">Shuffle</div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        var machine1 = $("#machine1").slotMachine({
            active	: 0,
            delay	: 500
        });

        var machine2 = $("#machine2").slotMachine({
            active	: 1,
            delay	: 500,
            direction: 'down'
        });

        var machine3 = $("#machine3").slotMachine({
            active	: 2,
            delay	: 500
        });

        function onComplete(active){
            switch(this.element[0].id){
                case 'machine1':
                    $("#machine1Result").text("Index: "+this.active);
                    break;
                case 'machine2':
                    $("#machine2Result").text("Index: "+this.active);
                    break;
                case 'machine3':
                    $("#machine3Result").text("Index: "+this.active);
                    break;
            }
        }

        $("#ranomizeButton").click(function(){

            machine1.shuffle(5, onComplete);

            setTimeout(function(){
                machine2.shuffle(5, onComplete);
            }, 500);

            setTimeout(function(){
                machine3.shuffle(5, onComplete);
            }, 1000);

        })
    });
</script>
