<template>
    <layout>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5>Lead Detail</h5>
                </div>
                <div class="card-body">
                    <form @submit.prevent="handleSubmit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter name"
                                           v-model="lead.name"
                                           id="name" tabindex="1">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter phone"
                                           v-model="lead.phone"
                                           id="phone" tabindex="3">
                                </div>
                                <div class="form-group">
                                    <label for="package">Interested Package</label>
                                    <input type="text" class="form-control" placeholder="Enter package"
                                           v-model="lead.interested_package"
                                           id="package" tabindex="5">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" placeholder="Enter email"
                                           v-model="lead.email"
                                           id="email" tabindex="2">
                                </div>

                                <div class="form-group">
                                    <label for="dob">Birthday</label>
                                    <input type="date" class="form-control" placeholder="Enter dob"
                                           v-model="lead.dob"
                                           id="dob" tabindex="4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success">Save</button>
                                <inertia-link class="btn btn-warning" :href="$route('lead.list')">Back
                                </inertia-link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card" v-if="lead.reminders.length > 0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h5>Reminders</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action"
                                    v-for="reminder in lead.reminders" :key="reminder.id">
                                    <div class="row">
                                        <div class="col-md-6">{{reminder.reminder}}</div>
                                        <div class="col-md-2">{{reminder.reminder_date}}</div>
                                        <div class="col-md-2">{{reminder.status}}</div>
                                        <div class="col-md-2">
                                            <inertia-link href="#" class="float-right">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                    <path fill-rule="evenodd"
                                                          d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                </svg>
                                            </inertia-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" v-else>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <h5>Reminders</h5>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary">
                                Add new reminder
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
    props: {
        leadProp: Object
    },
    components: {
        Layout
    },

    data() {
        return {
            lead: {
                name: '',
                email: '',
                phone: '',
                dob: '',
                package: '',
            }
        }
    },
    created() {
        this.lead = this.leadProp
    },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.post('/leads/update', this.lead)
        }
    }
}
</script>
