<template>


    <div class="collapse" id="create">
        <div class="card card-body">
            <form method="post" action="#" enctype="multipart/form-data" id="form1" @submit.prevent="store()">
                <div class="form-group">
                    <div class="col-4">
                        <img :src="oldsomeData" alt="" srcset="" class="img-fluid ">
                    </div>

                    <label for="img">圖片</label>
                    <input type="file" class="form-control" @change="processFile($event)" id="img" name="img" value ="">
                </div>
                <div class="form-group">
                    <label for="content">故事內容</label>
                    <input type="text" class="form-control" v-model="content" id="content" name="content">
                </div>
                <div class="form-group">
                    <label for="title">故事標題</label>
                    <input type="text" class="form-control" v-model="title" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="liqueur_id">產品系列</label>
                    <select name="liqueur_id" id="" v-model="id" class="form-control" >
                        <option :value="item.id" v-for="item in liqueur_kind">
                            {{ item.name }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" data-toggle="collapse"
                    data-target="#create">Submit</button>
            </form>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.post('/admin/liqueurStory_kind')
                .then(response=>this.liqueur_kind = response.data)
                .catch(function (error) {
                    console.log(error);
                });
        },
        data(){
            return{
                someData: null,
                oldsomeData:null,
                content:'',
                title:'',
                liqueur_kind:null,
                id:'',
                sort:0,
                name : [],
            }
        },
        methods:{
            store(){
                axios.post('/admin/liqueurStory',{
                    liqueur_id:this.id,
                    img:this.oldsomeData,
                    content:this.content,
                    title:this.title
                })
                .then(response => this.name = response.data)
                .catch(function (error) {
                    console.log(error);
                });

                this.clear();
                alert('成功',function(){
                    location.reload();
                });
            },
            processFile(event) {
                if(this.oldsomeData == null){
                    this.someData = event.target.files[0]
                    const fd = new FormData();
                    fd.append('file',this.someData, this.someData.name)
                    axios.post('/admin/liqueurStory_upload_img',fd)
                    .then(response=>this.oldsomeData = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
                }else{
                    axios.post('/admin/liqueurStory_delete_img',{file_link:this.oldsomeData})
                    .then(function(response){
                        console.log(response);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                    this.someData = event.target.files[0]
                    const fd = new FormData();
                    fd.append('file',this.someData, this.someData.name)
                    axios.post('/admin/liqueurStory_upload_img',fd)
                    .then(response=>this.oldsomeData = response.data)
                    .catch(function (error) {
                        console.log(error);
                    });
                }

            },
            clear(){

                $(".tbody").prepend(`
                <tr>
                    <td>
                       <div class="col-4">
                            <img src="${this.oldsomeData}" alt="" srcset="" class="img-fluid">
                        </div>
                    </td>
                    <td>${this.name}</td>

                    <td>
                        ${this.title}
                    </td>
                    <td>
                        ${this.content}
                    </td>
                    <td>
                        ${this.sort}
                    </td>
                    <td>

                    </td>

                </tr>`
                )
                this.someData = null,
                this.oldsomeData = '',
                this.content = '',
                this.title = '',
                this.id = ''

                $('#img').val('')
                axios.get('/admin/liqueurStory')
                    .then(function(response){
                        console.log(response);

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

        }
    }
</script>
