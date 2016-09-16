<script>
    export default{
        params: ['row'],

        bind: function(){
            this.el.addEventListener('submit',this.onFormSubmission.bind(this));
        },


        onComplete: function(){

            $('#'+this.params.row).fadeOut();
        },

        onFormSubmission: function(e){
            e.preventDefault();
            this.vm.$http[this.getResquestType()](this.el.action)
                    .then(this.onComplete.bind(this));
        },

        getResquestType: function(){
            var method = this.el.querySelector('input[name="_method"]')

            return (method ? method.value : this.el.method).toLowerCase();
        }
    }
</script>
