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
        </div>
    </layout>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
    components: {
        Layout
    },
    data() {
        return {
            lead: this.$inertia.form({
                name: '',
                email: '',
                phone: '',
                dob: '',
                package: '',
            })
        }
    },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.post('/leads/save', this.lead)
        }
    }
}
</script>
