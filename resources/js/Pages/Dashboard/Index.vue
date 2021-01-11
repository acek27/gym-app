<template>
    <div>
        <p>Welcome, {{fname}} {{lname}}</p>
    </div>
</template>

<script>
export default {
    props:['fname','lname']
}
</script>
