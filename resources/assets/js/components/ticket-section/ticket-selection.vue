<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="jumbotron">
        <div class="row">
            <div class="col-xs-8">
                <div id="chart"></div>
            </div>
            <div class="col-xs-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="ico-cursor mr5"></i>
                            Selecciona el tiquete.    
                        </h3>
                    </div>
                    <div class="panel-body pt0">
                        <label for="title-ticket">Tiquete</label>
                        <select id="title-ticket" class="form-control form-control-lg"  v-model="selectTicket" @change="chartConfiguration">
                            <option v-for="(ticket, idx) in tickets" :key="idx" v-bind:value="idx">{{ ticket['title']}}</option>
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
                next: false,
            }
        },
        mounted() {

                this.chart = new seatsio.SeatingChart({
                    divId: 'chart',
                    publicKey :             this.event['seats_configuration']["keys"]["public"],
                    language :              this.event['seats_configuration']["language"],
                    maxSelectedObjects:     this.selectQuantity,
                    event :                 this.event['event_stages'][this.stage_act]['seating_chart'],  
                    availableCategories :   [this.tickets[this.selectTicket]['title']],
                    showMinimap:            this.event['seats_configuration']["minimap"],
                    onObjectSelected: function(object){
                    },
                    onObjectDeselected: function(object){
                    }
                }).render();
        },
        methods: {
            chartConfiguration(){


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