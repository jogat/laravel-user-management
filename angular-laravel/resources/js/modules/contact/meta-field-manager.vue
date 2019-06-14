<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-for="field in fields" :key="field.id">
                    <div class="card-header">{{field.meta_type}}</div>

                    <div class="card-body">
                        {{field.meta_value}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            fields: {
                type: Array,
            }            
        },
        mounted() {
            console.log(this.fields)
        }
    }
</script>
