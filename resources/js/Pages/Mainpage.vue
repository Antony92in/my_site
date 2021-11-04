<template>
    <div>
        <navheader></navheader>
        <content></content>
        <the-site-footer></the-site-footer>
    </div>
</template>
<script>
import Navheader from './Mycomponents/Navheader';
import Content from './Mycomponents/Content';
import Search from './Mycomponents/Search';
import TheSiteFooter from './Mycomponents/TheSiteFooter';


export default {
    components: {
        Navheader,
        Content,
        Search,
        TheSiteFooter
    },
    mounted() {
        Prism.highlightAll();
    }
}
</script>

