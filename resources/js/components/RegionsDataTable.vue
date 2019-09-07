<template>
    <table class="table">
        <thead>
            <th v-for="column in columns" :key="column.id">
                <th>{{ column.name }}</th>
            </th>
        </thead>
        <tbody>
            <tr v-for="row in data" :key="row.id">
                <td scope="row"> {{ row.id }}</td>
                <td>{{ row.name }}</td>
                <td>{{ row.area }}</td>
            </tr>
        </tbody>
    </table>
</tem>
<script>
import axios from 'axios';

export default {
    props: {
        url: '',
        cols: [
        {
            id: '',
            name: '',
            value: ''
        }
        ]
    },
    data() {
        return {
            columns: this.cols,
            data: []
        }
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios.get(this.url).then(res => {
                this.data = res.data.data;
            });
        }
    }
}
</script>
