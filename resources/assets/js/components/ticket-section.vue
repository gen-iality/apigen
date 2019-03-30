<template>
    <div >
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        <ticketselected :event="event" :stage_act="stage_act" :tickets="tickets"></ticketselected>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ticketselected from './ticket-section/ticket-selected.vue';
    export default {
        components:{ticketselected},
        props: ['event','tickets','stage_act'],
        mounted() { 
            console.log('Component mounted.')
        }
    }
</script>
