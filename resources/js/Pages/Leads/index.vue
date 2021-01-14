<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <inertia-link :href="$route('lead.add')" class="btn btn-primary">Add
                        Data
                    </inertia-link>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Package</th>
                                <th>Added On</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="lead in leads" :key="lead.id">
                                <td>{{ lead.id }}</td>
                                <td>{{ lead.name }}</td>
                                <td>{{ lead.email }}</td>
                                <td>{{ lead.phone }}</td>
                                <td>{{ lead.age }}</td>
                                <td>{{ lead.interested_package }}</td>
                                <td>{{ lead.created_at }}</td>
                                <td>
                                    <inertia-link :href="$route('lead.view', {lead: lead})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                            <path fill-rule="evenodd"
                                                  d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                    </inertia-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
    props: [
        'leads'
    ]
}
</script>

