<template>
    <div>
        <navheader></navheader>
        <content></content>
    </div>
</template>
<script>
import Navheader from './Mycomponents/Navheader';
import Content from './Mycomponents/Content';
import Search from './Mycomponents/Search';


export default {
    components: {
        Navheader,
        Content,
        Search
    }
}
</script>

