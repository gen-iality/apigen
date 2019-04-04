<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="jumbotron">
        <div class="row">
            <div class="col-xs-7">
                <div id="chart"></div>
            </div>
            <div class="col-xs-5">
                <div class="panel">
                    <ul class="nav">
                        <li class="nav-item" v-for="(stage, idx) in event['event_stages']" :key="idx">
                            <a class="p-3 mb-2 bg-primary text-white"  href="#" v-if="event['event_stages'][stage_act]['title'] == stage['title']">
                                <p>{{stage['title']}} 
                                    <small style="float: right;">Hasta: {{stage['end_sale_date']}}</small>
                                </p>
                            </a> 
                            <a class="nav-link"  href="#" v-else>
                               <small> 
                                    <p>{{stage['title']}} 
                                        <small style="float: right; font-size: 1rem;">Desde: {{stage['start_sale_date']}}</small><br>
                                        <small style="float: right; font-size: 1rem;">Hasta: {{stage['end_sale_date']}}</small>
                                    </p>
                                </small>
                            </a> 

                        </li>
                    </ul>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ico-cursor mr5"></i>
                            Selecciona el tiquete.    
                        </h3>
                    </div>
                    <div class="panel-body pt0">
                        <label for="title-ticket">Tiquete</label>
                        <select id="title-ticket" class="form-control form-control-lg"  v-model="selectTicket" @change="chartConfiguration">
                            <option v-for="(ticket, idx) in currentTickets" :key="idx" v-bind:value="ticket['position']">{{ ticket['title']}}</option>
                        </select>
                        <label for="quantity-ticket">Cantidad</label>
                        <select id="quantity-ticket" class="form-control form-control-lg" v-model="selectQuantity" @change="chartConfiguration">
                            <option v-for="idx in 9" :key="idx">{{idx}}</option>
                        </select>
                    </div>

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ico-cart mr5"></i>
                            Resumen del pedido                    
                        </h3>
                    </div>

                    <div class="panel-body pt0">
                        <table class="table mb0 table-condensed">
                            <tbody>
                                <tr>
                                    <td class="pl0">
                                        {{ tickets[selectTicket]['title']}} 
                                        <b v-if="tickets[selectTicket]['price'] * selectQuantity > 0">{{selectQuantity}} X {{tickets[selectTicket]['currency'] }} $ {{tickets[selectTicket]['price']}} </b>
                                        <b v-else> X {{selectQuantity}}</b>
                                    </td>
                                    <td style="text-align: right;">
                                        <b v-if="tickets[selectTicket]['price'] * selectQuantity > 0">{{tickets[selectTicket]['currency'] }} $ {{ tickets[selectTicket]['price'] * selectQuantity }}</b>
                                        <b v-else>Gratis</b>  
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <h5>
                            Total: 
                                <span style="float: right;">
                                    <b v-if="tickets[selectTicket]['price'] * selectQuantity > 0">{{tickets[selectTicket]['currency'] }} $ {{ tickets[selectTicket]['price'] * selectQuantity }}  </b>
                                    <b v-else>Gratis</b>    
                                </span>
                        </h5>
                        <hr>
                        <div v-if="auth">
                            <div v-if="!next">
                                <a class="btn btn-lg btn-success card-submit" href="#" role="button" v-on:click="submit()">Comprar</a>
                            </div>
                            <div class="progress" v-else>
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        </div>

      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: ['event','stage_act', 'tickets', 'auth'],
        data() {
            return {
                selectTicket: 0,
                selectQuantity: 1,
                chart: [],
                selectedObject: [],
                activators : [

                ],
                next: false,
                currentTickets : []
            }
        },
        mounted() {

                this.chart = new seatsio.SeatingChart({
                    divId: 'chart',
                    publicKey :             this.event['seats_configuration']["keys"]["public"],
                    language :              this.event['seats_configuration']["language"],
                    maxSelectedObjects:     this.selectQuantity,
                    event :                 this.event['seats_configuration']["keys"]["event"],  
                    // event :                 this.tickets[this.selectTicket]['chart'],  
                    availableCategories :   [this.tickets[this.selectTicket]['title']],
                    showMinimap:            this.event['seats_configuration']["minimap"],
                    onObjectSelected: function(object){
                    },
                    onObjectDeselected: function(object){
                    }
                }).render();
                    console.log("Im here")
                // realizar ticket seleccionados por estado en la parte de aca
                var state_active = this.event['event_stages'][this.stage_act]['stage_id'];
                var flag = true;
                this.tickets.forEach((ticket,key) => {
                    if(ticket['stage_id'] == state_active){
                        ticket['position'] = key;
                        this.currentTickets.push(ticket)
                        if(flag){
                            this.selectTicket = key;
                            flag = false;
                        }
                    }
                });
        },
        methods: {
            chartConfiguration(){

                console.log(this.tickets[this.selectTicket]['chart']);

                //Cambio de chart
                this.chart.setAvailableCategories([[this.tickets[this.selectTicket]['title']]]);
                this.chart.changeConfig({
                    maxSelectedObjects: this.selectQuantity
                });
                this.chart.clearSelection();


            },

            async submit(){
                this.next = true;
                this.chart.listSelectedObjects(selectedObject =>{

                    var ticketTitle = 'ticket_'+this.tickets[this.selectTicket]['_id']
                    var data = {}
                    data[ticketTitle] = this.selectQuantity
                    data['seats'] = selectedObject
                    data['tickets'] = [this.tickets[this.selectTicket]['_id']]

                    if(this.selectQuantity == selectedObject.length){
                        console.log('YES');
                        var url = '/es/e/'+this.event['_id']+'/checkout';
                        fetch(  url, {
                                method: 'POST', // or 'PUT'
                                body: JSON.stringify(data),
                                headers:{
                                    'Content-Type': 'application/json'
                                }
                        }).then(res => res.json())
                        .catch(error => console.error('Error:', error))
                        .then(response => 
                            window.top.location.href = response.redirectUrl
                        );
                    }else{
                        humane.log('Te quedan '+ (this.selectQuantity - selectedObject.length) + ' puestos por seleccionar', {
                            timeoutAfterMove: 3000,
                            waitForMove: true
                        });
                        this.next = false;
                    }
                });

            }

        }
    }
</script>

<style>
 a.btn-success{
    width: 100%;
    color: #75f1c6 !important;
    border-color: #75f1c6;
 }
</style> 