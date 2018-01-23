<template>

    <div class="row">
        <div class="card">
            <div class="card-content">
                <span class="card-title">In afwachting</span>
            </div>
        </div>

        <assignment-collection :assignments="assignments"></assignment-collection>

    </div>

</template>

<script>
    import AssignmentCollection from "./assignmentCollection.vue"

    export default {
        name: "pending_assignments",
        components:{
            'assignment-collection': AssignmentCollection
        },
        data() {
            return {
                assignments: {}
            }
        },
        mounted() {
            axios.get('/api/assignments/pending').then(res => this.handleAssignments(res.data)).catch(error => console.log(error))
        },
        methods: {
            handleAssignments(data) {
                this.assignments = data;
            }
        }
    }
</script>

<style scoped>

</style>