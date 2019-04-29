<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="jumbotron">
          <div class="row">
            <div class="col-md-7">
              <div id="chart"></div>
            </div>
            <div class="col-md-5">
              <div class="panel">
                <ul class="nav">
                  <li class="nav-item" v-for="(stage, idx) in event['event_stages']" :key="idx">
                    <a
                      class="p-3 mb-2 bg-primary text-white active"
                      href="#"
                      v-if="event['event_stages'][stage_act]['title'] == stage['title']"
                    >
                      <p>
                        {{stage['title']}}
                        <small
                          style="float: right;"
                        >Hasta: {{stage['end_sale_date']}}</small>
                      </p>
                    </a>
                    <a class="nav-link" href="#" v-else>
                      <small>
                        <p>
                          {{stage['title']}}
                          <small
                            style="float: right; font-size: 1rem;"
                          >Desde: {{stage['start_sale_date']}}</small>
                          <br>
                          <small
                            style="float: right; font-size: 1rem;"
                          >Hasta: {{stage['end_sale_date']}}</small>
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
                  <select
                    id="title-ticket"
                    class="form-control form-control-lg"
                    v-model="selectTicket"
                    @change="chartConfiguration"
                  >
                    <option
                      v-for="(ticket, idx) in currentTickets"
                      :key="idx"
                      v-bind:value="ticket['position']"
                    >{{ ticket['title']}}</option>
                  </select>
                  <label for="quantity-ticket">Cantidad</label>
                  <select
                    id="quantity-ticket"
                    class="form-control form-control-lg"
                    v-model="selectQuantity"
                    @change="chartConfiguration"
                  >
                    <option v-for="idx in 1" :key="idx">{{idx}}</option>
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
                          <b
                            v-if="tickets[selectTicket]['price'] * selectQuantity > 0"
                          >{{selectQuantity}} X {{tickets[selectTicket]['currency'] }} $ {{tickets[selectTicket]['price']}}</b>
                          <b v-else>X {{selectQuantity}}</b>
                        </td>
                        <td style="text-align: right;">
                          <b
                            v-if="tickets[selectTicket]['price'] * selectQuantity > 0"
                          >{{tickets[selectTicket]['currency'] }} $ {{ tickets[selectTicket]['price'] * selectQuantity }}</b>
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
                      <b
                        v-if="tickets[selectTicket]['price'] * selectQuantity > 0"
                      >{{tickets[selectTicket]['currency'] }} $ {{ tickets[selectTicket]['price'] * selectQuantity }}</b>
                      <b v-else>Gratis</b>
                    </span>
                  </h5>
                  <hr>
                  <div v-if="auth">
                    <div v-if="!next">
                      <a
                        class="btn btn-lg btn-success card-submit"
                        href="#"
                        role="button"
                        v-on:click="submit()"
                      >Comprar</a>
                    </div>
                    <div class="progress" v-else>
                      <div
                        class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                        role="progressbar"
                        aria-valuenow="100"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        style="width: 100%"
                      ></div>
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
  props: ["event", "stage_act", "tickets", "auth"],
  data() {
    return {
      selectTicket: 0,
      selectTicketName: "",
      selectQuantity: 1,
      chart: [],
      selectedObject: [],
      activators: [],
      next: false,
      currentTickets: []
    };
  },
  mounted() {
    // realizar ticket seleccionados por estado en la parte de aca
    var state_active = this.event["event_stages"][this.stage_act]["stage_id"];
    var flag = true;
    this.tickets.forEach((ticket, key) => {
      if (ticket["stage_id"] == state_active) {
        ticket["position"] = key;
        this.currentTickets.push(ticket);
        if (flag) {
            this.selectTicket = key;
            this.selectTicketName = this.tickets[this.selectTicket]["title"];
            flag = false;
        }
      }
    });

    //paint char
    this.chart = new seatsio.SeatingChart({
      divId: "chart",
      publicKey: this.event["seats_configuration"]["keys"]["public"],
      language: this.event["seats_configuration"]["language"],
      maxSelectedObjects: this.selectQuantity,
      event: this.event["seats_configuration"]["keys"]["event"],
      availableCategories: [this.tickets[this.selectTicket]["title"]],
      showMinimap: this.event["seats_configuration"]["minimap"],
      onObjectSelected: function(object) {},
      onObjectDeselected: function(object) {}
    }).render();

  },
  methods: {
    chartConfiguration() {
      this.selectTicketName = this.tickets[this.selectTicket]["title"];

      //Cambio de chart
      this.chart.setAvailableCategories([
        [this.tickets[this.selectTicket]["title"]]
      ]);
      this.chart.changeConfig({
        maxSelectedObjects: this.selectQuantity
      });
      this.chart.clearSelection();
    },
    /**
     *
     *
     */

    async submit() {
      // this.next = true;
      this.chart.listSelectedObjects(selectedObject => {
        if (this.selectQuantity == selectedObject.length) {
          this.petition(selectedObject);
        } else {
          this.chart.listCategories(categories => {
            const result = categories.filter(
              category => category.label == this.selectTicketName
            );
            if (!result.length) {
              this.petition(null);
            } else {
              humane.log(
                "Te quedan " +
                  (this.selectQuantity - selectedObject.length) +
                  " puestos por seleccionar",
                {
                  timeoutAfterMove: 3000,
                  waitForMove: true
                }
              );
              this.next = false;
            }
          });
        }
      });
    },
    /**
     * Petition
     * 
     * Send petition to create  ticket
     */
    petition(selectedObject) {
        var ticketTitle = "ticket_" + this.tickets[this.selectTicket]["_id"];
        var data = {};
        data[ticketTitle] = this.selectQuantity;
        data["tickets"] = [this.tickets[this.selectTicket]["_id"]];
        if (!selectedObject) {
          var seat = {
            labels: 
              {
                displayedLabel: this.selectTicketName,
                own: this.selectTicketName,
                parent: this.selectTicketName,
                section: this.selectTicketName
              },
              id: this.selectTicketName,
              chart:{
                  config: {
                      event: this.event["seats_configuration"]["keys"]["event"]
                  }
              },
              label: this.selectTicketName,
              category: {
                  label: this.selectTicketName,
              }

          };
         selectedObject = [];
         for (var i = 0; i < this.selectQuantity; i++) {
             selectedObject.push(seat);
          }
        }
        data["seats"] = selectedObject;
        // console.log(data);
        var url = '/es/e/'+this.event['_id']+'/checkout';
            fetch(  url, {
                    method: 'POST', // or 'PUT'
                    body: JSON.stringify(data),
                    headers:{
                        'Content-Type': 'application/json'
                    }
            }).then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => {
                console.log(response.redirectUrl);
                window.top.location.href = response.redirectUrl
            }
            ); 
    }
  }
};
</script>

<style>
a.btn-success {
    background-color: #87e5c1;
    width: 100%;
    font-size: 100%;
    border-color: #87e5c1;
    font-family: Montserrat,sans-serif;
}

li > a.active {
        margin-left: -10px;
        margin-right: -10px;
}
</style> 