<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1.5">
                
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>