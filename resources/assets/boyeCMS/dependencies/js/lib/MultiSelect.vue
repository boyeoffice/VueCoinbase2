<template>
    <select style="width: 100%;" multiple="multiple" class="input-sm" :name="name">
        <slot></slot>
    </select>
</template>

<script>
//require('select2/dist/js/select2.js')
export default {
props: ['options', 'name', 'value'],
mounted: function(){
        var vm = this
        $(this.$el)
        //init select2
        .select2({theme: "bootstrap", data: this.options})
        .val(this.value)
        .trigger('change')
        //emit event on change 
        .on('change', function(){
            vm.$emit('input', $(this).val())
        })
    },
    watch: {
        value: function(value){
            //update value
            if([...value].sort().join(",") !== [...$(this.$el).val()].sort().join(",")){
                 $(this.$el)
                .val(value)
                .trigger('change')
            }
        },
        options: function(options){
            //update options
            $(this.$el).empty().select2({ data: options})
        }
    },
    destroyed: function(){
        $(this.$el).off().select2('destroy')
    }
}
</script>

<style>
.select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
    padding-top: 5px;
}

</style>



