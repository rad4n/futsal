<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <a href="/schedule/create" class="btn btn-md btn-primary">Add New Schedule</a>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">FROM</th>
                            <th scope="col">TO</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="schedule in schedules" :key="schedule.id">
                            <td>{{ `${moment(schedule.schedule_from).format('YYYY.MM.DD')} ${moment(schedule.opening_hour).format('HH:MM')}` }}</td>
                            <td>{{ `${moment(schedule.schedule_to).format('YYYY.MM.DD')} ${moment(schedule.closing_hour).format('HH:MM')}` }}</td>
                            <td>{{ schedule.duration*60 }}</td>
                            <td>{{ schedule.status }}</td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import LayoutApp from '../../Layouts/App.vue'
    import moment from 'moment'
    ///Vue.prototype.moment = moment


    export default {

        layout: LayoutApp,

        props: {
            schedules: Array
        },
        methods: {
        moment: function () {
            return moment();
        }
},
    }
</script>

<style>

</style>