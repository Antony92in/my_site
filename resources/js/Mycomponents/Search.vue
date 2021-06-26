<template>
    <div id="search-input" class="container">
        <div class="row">
            <div class="col-sm-3">
                <input type="text" @keyup.enter="sayHi" class="form-control" placeholder="Search article by title">
            </div>
            <a href="#" class="col-sm-2" @click="sayHi"><img src="search.png"></a>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            sayHi() {
                alert('Hello!');
            }
        }
    }
</script>
