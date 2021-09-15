<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>ADD Scehdule</h4>
                <hr>
                <form @submit.prevent="storeSchedule">
                    <h5>Cost Price (RM)</h5>
                    <div class="form-check">
                        <input v-model="schedule.price" value="250" class="form-check-input" type="radio" name="price" id="price1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Fee 1.50 + Amount:1.00 = Total:2.50
                        </label>
                    </div>
                    <div class="form-check">
                        <input v-model="schedule.price"  value="1100" class="form-check-input" type="radio" name="price" id="price2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Fee 1.50 + Amount:9.00 = Total:11.00
                        </label>
                    </div>
                     <div class="form-check">
                        <input v-model="schedule.price"  value="1150" class="form-check-input" type="radio" name="price" id="price3">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Fee 1.50 + Amount:10.00 = Total:11.50
                        </label>
                    </div>
                     <div class="form-check">
                        <input v-model="schedule.price"  value="150" class="form-check-input" type="radio" name="price" id="price4">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Fee 0.50 + Amount:1.00 = Total:1.50
                        </label>
                    </div>
                    <div v-if="errors.price" class="mt-2 alert alert-danger">
                        {{ errors.price }}
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="exampleFormControlInput1" class="form-label">From</label>
                            <input v-model="schedule.schedule_from"  name="schedule_from" type="date" class="form-control" id="schedule_from">
                            <div v-if="errors.schedule_from" class="mt-2 alert alert-danger">
                                {{ errors.schedule_from }}
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <label for="exampleFormControlInput1" class="form-label">To</label>
                            <input v-model="schedule.schedule_to" name="schedule_to" type="date" class="form-control" id="schedule_to">
                             <div v-if="errors.schedule_to" class="mt-2 alert alert-danger">
                                {{ errors.schedule_to }}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="opening_hour" class="form-label">Opening Hour</label>
                            <input  v-model="schedule.opening_hour" name="opening_hour" type="time" class="form-control" id="opening_hour">
                            <div v-if="errors.opening_hour" class="mt-2 alert alert-danger">
                                {{ errors.opening_hour }}
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <label for="closing_hour" class="form-label">Closing Hour</label>
                            <input v-model="schedule.closing_hour" name="closing_hour" type="time" class="form-control" id="closing_hour">
                            <div v-if="errors.closing_hour" class="mt-2 alert alert-danger">
                                {{ errors.closing_hour }}
                            </div>
                        </div>
                    </div>
                    <h5>Duration</h5>
                    <div class="form-check">
                        <input value="1" v-model="schedule.duration" class="form-check-input" type="radio" name="duration" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            1 hour / session
                        </label>
                        </div>
                    <div class="form-check">
                        <input value="2" v-model="schedule.duration" class="form-check-input" type="radio" name="duration" id="flexRadioDefault2">
                          <label class="form-check-label" for="flexRadioDefault2">
                            2 hour / session
                        </label>
                    </div>
                    <div class="form-check">
                        <input value="3" v-model="schedule.duration" class="form-check-input" type="radio" name="duration" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            3 hour / session
                        </label>
                         <div v-if="errors.duration" class="mt-2 alert alert-danger">
                            {{ errors.duration }}
                         </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    //import layout
    import LayoutApp from '../../Layouts/App.vue'

    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {

        //layout
        layout: LayoutApp,

        //props
        props: {
            errors: Object
        },

        //define Composition Api
        setup() {

            //state posts
            const schedule = reactive({
                price           : '',
                schedule_from   : '',
                schedule_to     : '',
                opening_hour    : '',
                closing_hour    : '',
                duration        : '',
            })

            //function storePost
            function storeSchedule() {
                //define variable 
                let price           = schedule.price
                let schedule_from   = schedule.schedule_from
                let schedule_to     = schedule.schedule_to
                let opening_hour    = schedule.opening_hour
                let closing_hour    = schedule.closing_hour
                let duration        = schedule.duration

                //send data
                Inertia.post('/schedule/', {
                    price            : price,
                    schedule_from    : schedule_from,
                    schedule_to      : schedule_to,
                    opening_hour     : opening_hour,
                    closing_hour     : closing_hour,
                    duration         : duration,
                })
            }

            return {
                schedule,
                storeSchedule
            }

        }
    }
</script>