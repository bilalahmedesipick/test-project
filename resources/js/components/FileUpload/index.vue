<template>
    <div class="container">

                    <div class="panel panel-default">
                        <div class="panel-header">
                            <h3>File Upload Demo Using Vue</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input type="email" v-model="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="file">File:</label>
                                <input type="file" ref="file" name="file" class="form-control" id="file">
                            </div>



                        </div>
                        <div class="panel-footer">
                            <button type="button" @click="submit_data()" class="btn btn-success">Submit</button>

                        </div>
                    </div>

                </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

        },
        data: function () {
            return {
                email: '',
                file: ''
            }
        },
        methods: {
            submit_data(){

                let formdata= new FormData();

                formdata.append('email', this.email);
                this.file = this.$refs.file.files[0];

                formdata.append('file', this.file);
               if(this.file.size > 2*1000000000){
                   console.log("uploaded file was greater then 2 GB");
                   return 0;
               }

                axios.post('/api/upload-file', formdata,{
                    headers:{
                    'Content-Type':'multipart/form-data'
                    }
                }).then((response) => {
                    console.log(response);
                }).catch((error) => {
                    console.log(error);
                })

            }

        }



    }
</script>
