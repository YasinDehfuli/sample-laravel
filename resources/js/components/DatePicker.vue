<template>
    <div>
        <input type="text"  class="dp form-control" :placeholder="xplaceholder">
        <input type="hidden" v-model="dp" :name="xname" >
    </div>
</template>

<script>
    import 'mpdatepicker/dist/jquery.mpdatepicker.min.css';
    import 'jquery';
    import 'mpdatepicker/dist/jquery.mpdatepicker.min';
    export default {
        name: "DatePicker",
        data:function () {
          return{
              dp:'',
          }
        },
        props:['xname','xplaceholder'],
        mounted() {
            let self = this;
            jQuery(".dp").mpdatepicker({
                'timePicker': false,
                onSelect: function (selected) {
                    self.dp = selected;
                },
            });
        }
    }
</script>

<style scoped>

</style>
